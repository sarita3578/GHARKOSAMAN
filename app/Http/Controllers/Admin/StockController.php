<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // Show the stock alerts page
    public function alerts()
    {
        // You can fetch low stock products or alerts here later
        return view('admin.stock.alerts'); // Make sure this Blade file exists
    }

    // Example: Redirect method
    public function redirectToAlerts()
    {
        // Perform some logic if needed

        // Redirect to the stock alerts route
        return redirect()->route('admin.stock.alerts');
    }
}
