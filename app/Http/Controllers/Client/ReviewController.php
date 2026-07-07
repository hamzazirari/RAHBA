<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller {
    public function store(Request $request, $productId) {
        Review::create([...$request->all(), 'product_id' => $productId, 'user_id' => auth()->id()]);
        return back();
    }
    public function delete($id) {
        Review::where('id', $id)->where('user_id', auth()->id())->delete();
        return back();
    }
}