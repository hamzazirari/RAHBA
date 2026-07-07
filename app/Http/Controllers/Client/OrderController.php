<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {
    public function myOrders() {
        return view('client.dashboard', ['orders' => Order::where('user_id', Auth::id())->latest()->get()]);
    }
    public function show($id) {
        return view('client.order-details', ['order' => Order::where('user_id', Auth::id())->findOrFail($id)]);
    }
    public function cancel($id) {
        Order::where('id', $id)->where('user_id', Auth::id())->update(['status' => 'cancelled']);
        return back();
    }
}