<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class VendorProfileController extends Controller
{
    public function show()
    {
        $vendor = Auth::user();
        $stats = $this->getVendorStats();

        return view('vendor.profile', compact('vendor', 'stats'));
    }

    public function edit()
    {
        return $this->show();
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_description' => ['nullable', 'string', 'max:1000'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if (Auth::user()->profile_photo) {
                Storage::disk('public')->delete(Auth::user()->profile_photo);
            }

            $data['profile_photo'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        Auth::user()->update($data);

        return back()->with('status', 'profile-updated');
    }

    public function changePassword()
    {
        return $this->show();
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        Auth::user()->update(['password' => Hash::make($data['password'])]);

        return back()->with('status', 'password-updated');
    }

    public function getVendorStats(): array
    {
        $productIds = Product::where('user_id', Auth::id())->pluck('id');

        return [
            'reviews_count' => Review::whereIn('product_id', $productIds)->count(),
            'average_rating' => round((float) Review::whereIn('product_id', $productIds)->avg('rating'), 1),
            'products_count' => $productIds->count(),
        ];
    }
}
