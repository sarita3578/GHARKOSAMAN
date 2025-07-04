<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class AdminDashboardController extends Controller
{
    // Admin dashboard page
    public function index()
    {
        $orders = Order::latest()->get();
        $products = Product::latest()->get();

        $categories = Category::latest()->get();
        $totalOrders = $orders->count();
        $totalUsers = User::count();
        $totalRevenue = $orders->sum('total');

        return view('admin.dashboard', compact(
            'orders',
            'products',
            'categories',
            'totalOrders',
            'totalUsers',
            'totalRevenue'
        ));
    }

    // Customer details page
    public function userDetails($id)
    {
        $user = User::with(['orders.items.product'])->findOrFail($id);
        return view('admin.user-details', compact('user'));
    }
}
