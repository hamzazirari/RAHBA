<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function myOrders()
    {
        $orders = Order::with('items.product.user')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('client.dashboard', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::with(['items.product.user', 'payment'])
            ->where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('client.order-details', compact('order'));
    }

    public function filter($status)
    {
        $allowed = ['pending', 'processing', 'delivered', 'cancelled'];
        abort_unless(in_array($status, $allowed, true), 404);

        $orders = Order::with('items.product.user')
            ->where('user_id', Auth::id())
            ->where('status', $status)
            ->latest()
            ->get();

        return view('client.dashboard', compact('orders', 'status'));
    }

    public function cancel($orderId)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($orderId);

        if (!in_array($order->status, ['pending', 'processing'], true)) {
            return back()->with('error', 'Cette commande ne peut plus etre annulee.');
        }

        $order->update(['status' => 'cancelled']);

        return back()->with('success', 'Commande annulee.');
    }

    public function export($orderId)
    {
        $order = Order::with(['items.product', 'payment'])
            ->where('user_id', Auth::id())
            ->findOrFail($orderId);

        return view('client.order-details', compact('order'));
    }
}
