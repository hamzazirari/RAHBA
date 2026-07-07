<?php
namespace App\Http\Controllers\Public;
use App\Http\Controllers\Controller;
use App\Models\User;

class VendorShopController extends Controller {
    public function show($vendorId) {
        $vendor = User::where('role', 'vendor')->findOrFail($vendorId);
        return view('public.shop', [
            'vendor' => $vendor,
            'products' => $vendor->products()->paginate(12)
        ]);
    }
}