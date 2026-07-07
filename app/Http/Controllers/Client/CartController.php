<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\{Cart, CartItem};
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function view() {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return view('client.cart', ['items' => $cart->items()->with('product')->get()]);
    }
    public function addToCart($id) {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        CartItem::updateOrCreate(['cart_id' => $cart->id, 'product_id' => $id], ['quantity' => \DB::raw('quantity + 1')]);
        return back();
    }
    public function updateQuantity($itemId, $qty) {
        CartItem::where('id', $itemId)->update(['quantity' => $qty]);
        return back();
    }
    public function removeItem($itemId) {
        CartItem::destroy($itemId);
        return back();
    }
}