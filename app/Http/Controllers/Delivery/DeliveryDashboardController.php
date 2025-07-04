<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DeliveryDashboardController extends Controller
{
    // Show delivery dashboard with orders assigned to the delivery person
    public function index()
    {
        // Get the logged-in delivery person
        $deliveryPerson = Auth::guard('delivery')->user();

        // Fetch orders assigned to this delivery person, eager loading user info
        $orders = Order::where('delivery_person_id', $deliveryPerson->id)
            ->with('user')
            ->get();

        // Pass both delivery person and orders to the view
        return view('delivery.dashboard', compact('deliveryPerson', 'orders'));
    }
    public function showRegisterForm()
{
    return view('delivery.auth.register');
}


    // Show a dedicated orders page if needed (optional)
    public function orders()
    {
        $deliveryPerson = Auth::guard('delivery')->user();

        $orders = Order::where('delivery_person_id', $deliveryPerson->id)
            ->with('user')
            ->get();

        return view('delivery.orders', compact('orders'));
    }
}
