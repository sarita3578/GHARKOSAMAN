<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function welcome()
    {
        // Load 6 most viewed products
        $popularProducts = Product::latest()->take(6)->get();


        // Load all categories
        $categories = Category::all();

        // Pass data to welcome view
        return view('welcome', compact('popularProducts', 'categories'));
    }
}

