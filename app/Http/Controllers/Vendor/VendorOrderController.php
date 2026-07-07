<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    public function index()
    {
        $orders = $this->vendorOrdersQuery()->latest()->paginate(15);

        return view('vendor.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = $this->vendorOrder($orderId);
        $vendorItems = $order->items->filter(fn ($item) => $item->product?->user_id === Auth::id());

        return view('vendor.orders.show', compact('order', 'vendorItems'));
    }

    public function updateStatus(Request $request, $orderId, ?string $status = null)
    {
        $status ??= $request->input('status');

        abort_unless(in_array($status, ['pending', 'processing', 'delivered', 'cancelled'], true), 422);

        $order = $this->vendorOrder($orderId);
        $order->update(['status' => $status]);

        return back()->with('success', 'Statut de la commande mis a jour.');
    }

    public function filter($status)
    {
        abort_unless(in_array($status, ['pending', 'processing', 'delivered', 'cancelled'], true), 404);

        $orders = $this->vendorOrdersQuery()
            ->where('status', $status)
            ->latest()
            ->paginate(15);

        return view('vendor.orders.index', compact('orders', 'status'));
    }

    public function export($orderId)
    {
        return $this->show($orderId);
    }

    public function getClientInfo($orderId)
    {
        $order = $this->vendorOrder($orderId);

        return response()->json([
            'name' => $order->user->name,
            'email' => $order->user->email,
            'phone' => $order->user->phone,
            'delivery_address' => $order->delivery_address,
        ]);
    }

    private function vendorOrdersQuery()
    {
        return Order::with(['user', 'items.product'])
            ->whereHas('items.product', fn ($query) => $query->where('user_id', Auth::id()));
    }

    private function vendorOrder($orderId): Order
    {
        return $this->vendorOrdersQuery()->findOrFail($orderId);
    }
}
