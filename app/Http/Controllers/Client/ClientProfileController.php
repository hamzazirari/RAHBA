<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ClientProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load('orders');

        return view('profile.edit', compact('user'));
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
        ]);

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
