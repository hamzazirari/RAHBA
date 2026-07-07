<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function view()
    {
        $cart = $this->currentCart();
        $items = $cart->items()->with('product.user')->get();
        $cartItems = $this->formatCartItems($items);
        $totalAmount = $items->sum(fn ($item) => $item->quantity * $item->product->price);

        $this->syncCartTotals($cart, $items);

        return view('client.cart', compact('cart', 'cartItems', 'totalAmount'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        if ($product->stock <= 0) {
            return back()->with('error', 'Ce produit est en rupture de stock.');
        }

        $quantity = max(1, (int) $request->input('quantity', 1));
        $cart = $this->currentCart();
        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ]);

        $item->quantity = min(($item->quantity ?? 0) + $quantity, $product->stock);
        $item->save();
        $this->syncCartTotals($cart);

        return back()->with('success', 'Produit ajoute au panier.');
    }

    public function updateQuantity(Request $request, $cartItemId)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $item = $this->currentCart()->items()->with('product')->findOrFail($cartItemId);

        if ((int) $data['quantity'] === 0) {
            $item->delete();
        } else {
            $item->update(['quantity' => min((int) $data['quantity'], $item->product->stock)]);
        }

        $this->syncCartTotals($this->currentCart());

        return back();
    }

    public function removeItem($cartItemId)
    {
        $this->currentCart()->items()->whereKey($cartItemId)->delete();
        $this->syncCartTotals($this->currentCart());

        return back()->with('success', 'Article supprime du panier.');
    }

    public function clearCart()
    {
        $cart = $this->currentCart();
        $cart->items()->delete();
        $this->syncCartTotals($cart);

        return back()->with('success', 'Panier vide.');
    }

    public function getCartCount()
    {
        return response()->json([
            'count' => $this->currentCart()->items()->sum('quantity'),
        ]);
    }

    private function currentCart()
    {
        return Cart::firstOrCreate(['user_id' => Auth::id()]);
    }

    private function syncCartTotals(Cart $cart, $items = null): void
    {
        $items ??= $cart->items()->with('product')->get();

        $cart->update([
            'total_items' => $items->sum('quantity'),
            'total_price' => $items->sum(fn ($item) => $item->quantity * $item->product->price),
        ]);
    }

    private function formatCartItems($items): array
    {
        return $items->mapWithKeys(function ($item) {
            return [$item->id => [
                'name' => $item->product->name,
                'image_url' => $item->product->image_url,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'shop_name' => $item->product->user->shop_name ?? 'Vendeur Rahba',
            ]];
        })->all();
    }
}
