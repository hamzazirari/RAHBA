<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($productId)
    {
        $product = Product::with(['category', 'user', 'reviews.user'])->findOrFail($productId);

        return view('public.show', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        $product = Product::findOrFail($productId);

        if (!$this->clientPurchasedProduct($product->id)) {
            return back()->with('error', 'Vous devez commander ce produit avant de laisser un avis.');
        }

        Review::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $product->id],
            $data
        );

        return back()->with('success', 'Avis enregistre.');
    }

    public function edit($reviewId)
    {
        $review = Review::where('user_id', Auth::id())->findOrFail($reviewId);

        return redirect()->route('products.show', $review->product_id);
    }

    public function update(Request $request, $reviewId)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        Review::where('user_id', Auth::id())->findOrFail($reviewId)->update($data);

        return back()->with('success', 'Avis modifie.');
    }

    public function delete($reviewId)
    {
        Review::where('user_id', Auth::id())->findOrFail($reviewId)->delete();

        return back()->with('success', 'Avis supprime.');
    }

    private function clientPurchasedProduct($productId): bool
    {
        return Auth::user()->orders()
            ->whereIn('status', ['processing', 'delivered'])
            ->whereHas('items', fn ($query) => $query->where('product_id', $productId))
            ->exists();
    }
}
