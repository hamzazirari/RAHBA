<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    public function show() { return view('client.checkout'); }
    public function processPayment(Request $request) { /* Logique Stripe/Paypal */ return redirect()->route('checkout.success', 1); }
    public function paymentSuccess($id) { return view('client.checkout-success', compact('id')); }
}