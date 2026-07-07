<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ClientProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load('orders');

        return view('client.profile', compact('user'));
    }

    public function edit(Request $request)
    {
        return $this->show($request);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'shop_name' => ['nullable', 'required_if:role,vendor', 'string', 'max:255'],
            'shop_description' => ['nullable', 'required_if:role,vendor', 'string', 'max:1000'],
        ]);

        if ($request->user()->role !== 'vendor') {
            unset($data['shop_name'], $data['shop_description']);
        }

        if ($request->hasFile('profile_photo')) {
            if ($request->user()->profile_photo) {
                Storage::disk('public')->delete($request->user()->profile_photo);
            }

            $data['profile_photo'] = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $request->user()->update($data);

        return back()->with('status', 'profile-updated');
    }

    public function changePassword(Request $request)
    {
        return $this->show($request);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
