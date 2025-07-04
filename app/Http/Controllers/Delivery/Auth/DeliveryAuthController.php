<?php

namespace App\Http\Controllers\Delivery\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Delivery;

class DeliveryAuthController extends Controller
{
    // Show the delivery registration form
    public function showRegisterForm()
    {
        return view('delivery.auth.register');
    }

    // Handle the delivery registration form submission
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:deliveries',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $delivery = Delivery::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('delivery')->login($delivery);

        return redirect()->route('delivery.dashboard');
    }
}
