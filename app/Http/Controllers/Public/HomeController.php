<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $featuredProducts = Product::with(['category', 'user'])
            ->withAvg('reviews', 'rating')
            ->when($request->filled('search'), fn ($query) => $query->where('name', 'like', '%' . $request->search . '%'))
            ->when($request->filled('category'), fn ($query) => $query->where('category_id', $request->category))
            ->when($request->filled('min_price'), fn ($query) => $query->where('price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn ($query) => $query->where('price', '<=', $request->max_price))
            ->when($request->sort === 'price_asc', fn ($query) => $query->orderBy('price'))
            ->when($request->sort === 'price_desc', fn ($query) => $query->orderByDesc('price'))
            ->when($request->sort === 'newest' || !$request->filled('sort'), fn ($query) => $query->latest())
            ->take(8)
            ->get();

        return view('public.home', compact('categories', 'featuredProducts'));
    }

    public function search(Request $request)
    {
        return redirect()->route('products.index', $request->only('search'));
    }
}
