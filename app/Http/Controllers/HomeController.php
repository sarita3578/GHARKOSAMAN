<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(8)->get(); // or Product::all();
        return view('welcome', compact('products')); // This passes $products to the Blade view
    }
}
