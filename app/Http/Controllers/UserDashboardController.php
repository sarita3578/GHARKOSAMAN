<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        // Get orders for logged-in user, adjust as needed
        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('user.dashboard', compact('orders'));
    }
}
