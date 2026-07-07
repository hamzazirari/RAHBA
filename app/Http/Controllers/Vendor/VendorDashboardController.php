<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorDashboardController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard', [
            'stats' => $this->getStats(),
            'salesChart' => $this->getSalesChart(),
            'recentOrders' => $this->getRecentOrders(),
            'topProducts' => $this->getTopProducts(),
        ]);
    }

    public function getStats(): array
    {
        $vendorId = Auth::id();

        $productIds = Product::where('user_id', $vendorId)->pluck('id');
        $orderIds = OrderItem::whereIn('product_id', $productIds)->distinct()->pluck('order_id');

        return [
            'products_count' => $productIds->count(),
            'orders_count' => $orderIds->count(),
            'reviews_count' => Review::whereIn('product_id', $productIds)->count(),
            'revenue_total' => (float) OrderItem::whereIn('product_id', $productIds)->sum('subtotal'),
            'average_rating' => round((float) Review::whereIn('product_id', $productIds)->avg('rating'), 1),
        ];
    }

    public function getSalesChart(): array
    {
        $vendorId = Auth::id();
        $productIds = Product::where('user_id', $vendorId)->pluck('id');
        $start = now()->startOfMonth()->subMonths(5);

        $sales = OrderItem::query()
            ->selectRaw('YEAR(orders.created_at) as year, MONTH(orders.created_at) as month, SUM(order_items.subtotal) as total')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->whereIn('order_items.product_id', $productIds)
            ->where('orders.created_at', '>=', $start)
            ->groupBy('year', 'month')
            ->get()
            ->keyBy(fn ($row) => $row->year . '-' . $row->month);

        return collect(range(5, 0))->map(function ($offset) use ($sales) {
            $month = now()->startOfMonth()->subMonths($offset);
            $key = $month->year . '-' . $month->month;

            return [
                'label' => $month->translatedFormat('M Y'),
                'total' => (float) ($sales[$key]->total ?? 0),
            ];
        })->all();
    }

    public function getRecentOrders()
    {
        $vendorId = Auth::id();

        return Order::with(['user', 'items.product'])
            ->whereHas('items.product', fn ($query) => $query->where('user_id', $vendorId))
            ->latest()
            ->take(5)
            ->get();
    }

    public function getTopProducts()
    {
        return Product::query()
            ->select('products.*', DB::raw('COALESCE(SUM(order_items.quantity), 0) as sold_quantity'))
            ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
            ->where('products.user_id', Auth::id())
            ->groupBy('products.id', 'products.user_id', 'products.category_id', 'products.name', 'products.description', 'products.price', 'products.stock', 'products.image_url', 'products.is_active', 'products.created_at', 'products.updated_at')
            ->orderByDesc('sold_quantity')
            ->take(5)
            ->get();
    }
}
