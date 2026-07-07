<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientProfileController extends Controller {
    public function show() { return view('profile.edit'); }
    public function update(Request $request) {
        $request->user()->update($request->validate(['name' => 'required', 'email' => 'required|email']));
        return back();
    }
}