<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        $products = $this->filteredProducts($request)->paginate(12)->withQueryString();

        return view('public.catalog', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'user', 'reviews.user'])
            ->withAvg('reviews', 'rating')
            ->findOrFail($id);

        return view('public.show', compact('product'));
    }

    public function filter(Request $request)
    {
        return $this->index($request);
    }

    public function search(Request $request, ?string $keyword = null)
    {
        if ($keyword) {
            $request->merge(['search' => $keyword]);
        }

        return $this->index($request);
    }

    public function reviews($productId)
    {
        $product = Product::with(['reviews.user'])->findOrFail($productId);

        return response()->json($product->reviews);
    }

    private function filteredProducts(Request $request)
    {
        return Product::with(['category', 'user'])
            ->withAvg('reviews', 'rating')
            ->when($request->filled('search'), fn ($query) => $query->where('name', 'like', '%' . $request->search . '%'))
            ->when($request->filled('category'), fn ($query) => $query->where('category_id', $request->category))
            ->when($request->filled('categories'), function ($query) use ($request) {
                $query->whereHas('category', fn ($categoryQuery) => $categoryQuery->whereIn('slug', (array) $request->categories));
            })
            ->when($request->filled('min_price'), fn ($query) => $query->where('price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn ($query) => $query->where('price', '<=', $request->max_price))
            ->when($request->filled('min_rating'), fn ($query) => $query->having('reviews_avg_rating', '>=', $request->min_rating))
            ->when($request->sort === 'price_asc', fn ($query) => $query->orderBy('price'))
            ->when($request->sort === 'price_desc', fn ($query) => $query->orderByDesc('price'))
            ->when($request->sort === 'newest' || !$request->filled('sort'), fn ($query) => $query->latest());
    }
}
