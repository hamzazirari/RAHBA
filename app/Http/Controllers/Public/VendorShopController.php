<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class VendorShopController extends Controller
{
    public function show(Request $request, $vendorId)
    {
        $vendor = User::where('role', 'vendor')->findOrFail($vendorId);
        $products = $this->vendorProductsQuery($request, $vendorId)->paginate(12)->withQueryString();
        $reviews = Review::with('user')
            ->whereHas('product', fn ($query) => $query->where('user_id', $vendorId))
            ->latest('created_at')
            ->take(6)
            ->get();

        return view('public.vendor-shop', compact('vendor', 'products', 'reviews'));
    }

    public function products(Request $request, $vendorId)
    {
        User::where('role', 'vendor')->findOrFail($vendorId);

        return $this->vendorProductsQuery($request, $vendorId)->paginate(12)->withQueryString();
    }

    public function reviews($vendorId)
    {
        User::where('role', 'vendor')->findOrFail($vendorId);

        return Review::with(['user', 'product'])
            ->whereHas('product', fn ($query) => $query->where('user_id', $vendorId))
            ->latest('created_at')
            ->paginate(12);
    }

    private function vendorProductsQuery(Request $request, $vendorId)
    {
        return Product::with(['category', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->where('user_id', $vendorId)
            ->where('is_active', true)
            ->when($request->filled('search'), fn ($query) => $query->where('name', 'like', '%' . $request->search . '%'))
            ->when($request->filled('category'), fn ($query) => $query->where('category_id', $request->category))
            ->when($request->filled('min_price'), fn ($query) => $query->where('price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn ($query) => $query->where('price', '<=', $request->max_price))
            ->latest();
    }
}
