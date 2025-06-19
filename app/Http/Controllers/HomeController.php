<?php
namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
   $products = Product::all();ilter by category if needed
        $categories = Category::all();
        return view('home', compact('products'));
    }
}
