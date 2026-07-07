<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index(Request $request) {
        $products = Product::query()
            ->when($request->category, fn($q, $cat) => $q->where('category_id', $cat))
            ->when($request->min_price, fn($q, $p) => $q->where('price', '>=', $p))
            ->paginate(12);
        return view('public.catalog', compact('products'));
    }
    public function show($id) {
        $product = Product::with(['category', 'reviews.user'])->findOrFail($id);
        return view('public.show', compact('product'));
    }
}