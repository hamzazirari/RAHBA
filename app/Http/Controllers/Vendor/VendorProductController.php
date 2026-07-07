<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->where('user_id', Auth::id())
            ->when($request->filled('q'), fn ($query) => $query->where('name', 'like', '%' . $request->q . '%'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('vendor.products', ['products' => $products, 'keyword' => $request->q]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('vendor.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedProductData($request);
        unset($data['image']);

        $data['user_id'] = Auth::id();
        $data['is_active'] = true;

        if ($request->hasFile('image')) {
            $data['image_url'] = 'storage/' . $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('vendor.products.index')->with('success', 'Produit cree.');
    }

    public function edit($productId)
    {
        $product = $this->vendorProduct($productId);
        $categories = Category::orderBy('name')->get();

        return view('vendor.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $productId)
    {
        $product = $this->vendorProduct($productId);
        $data = $this->validatedProductData($request, false);
        unset($data['image']);

        if ($request->hasFile('image')) {
            $this->deleteStoredProductImage($product);
            $data['image_url'] = 'storage/' . $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('vendor.products.index')->with('success', 'Produit mis a jour.');
    }

    public function delete($productId)
    {
        $product = $this->vendorProduct($productId);
        $this->deleteStoredProductImage($product);
        $product->delete();

        return back()->with('success', 'Produit supprime.');
    }

    public function search($keyword)
    {
        $products = Product::with('category')
            ->where('user_id', Auth::id())
            ->where('name', 'like', '%' . $keyword . '%')
            ->latest()
            ->paginate(12);

        return view('vendor.products', compact('products', 'keyword'));
    }

    public function toggleActive($productId)
    {
        $product = $this->vendorProduct($productId);
        $product->update(['is_active' => ! $product->is_active]);

        return back()->with('success', 'Statut du produit mis a jour.');
    }

    private function validatedProductData(Request $request, bool $imageRequired = true): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => [$imageRequired ? 'required' : 'nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
    }

    private function vendorProduct($productId): Product
    {
        return Product::where('user_id', Auth::id())->findOrFail($productId);
    }

    private function deleteStoredProductImage(Product $product): void
    {
        if ($product->image_url && str_starts_with($product->image_url, 'storage/')) {
            Storage::disk('public')->delete(substr($product->image_url, strlen('storage/')));
        }
    }
}
