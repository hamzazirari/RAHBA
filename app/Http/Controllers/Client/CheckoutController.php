<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = $this->cartWithItems();
        $cartItems = $cart->items;
        $totalAmount = $this->cartTotal($cart);

        return view('client.checkout', compact('cart', 'cartItems', 'totalAmount'));
    }

    public function processPayment(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'city' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:500'],
            'payment_method' => ['required', 'in:cod'],
        ]);

        $cart = $this->cartWithItems();

        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Votre panier est vide.');
        }

        foreach ($cart->items as $item) {
            if ($item->quantity > $item->product->stock) {
                return back()->with('error', "Stock insuffisant pour {$item->product->name}.");
            }
        }

        $order = DB::transaction(function () use ($cart, $data) {
            $total = $this->cartTotal($cart);

            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'CMD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6)),
                'total_price' => $total,
                'status' => 'pending',
                'delivery_address' => $data['name'] . "\n" . $data['phone'] . "\n" . $data['address'] . ', ' . $data['city'],
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'subtotal' => $item->quantity * $item->product->price,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            Payment::create([
                'order_id' => $order->id,
                'total_items' => $cart->items->sum('quantity'),
                'total_price' => $total,
            ]);

            $cart->items()->delete();
            $cart->update(['total_items' => 0, 'total_price' => 0]);

            return $order;
        });

        return redirect()->route('checkout.success', $order->id)->with('success', 'Commande confirmee.');
    }

    public function confirmOrder(Request $request)
    {
        return $this->processPayment($request);
    }

    public function paymentSuccess($id)
    {
        $order = Order::with(['items.product.user', 'payment'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('client.order-details', compact('order'));
    }

    public function paymentFailed()
    {
        return redirect()->route('checkout.show')->with('error', 'Le paiement a echoue. Veuillez reessayer.');
    }

    private function cartWithItems()
    {
        return Cart::firstOrCreate(['user_id' => Auth::id()])
            ->load('items.product.user');
    }

    private function cartTotal(Cart $cart): float
    {
        return (float) $cart->items->sum(fn ($item) => $item->quantity * $item->product->price);
    }
}
