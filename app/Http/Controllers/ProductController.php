<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show home page with latest 8 products
    public function welcome()
    {
        $products = Product::latest()->take(8)->get();
        $categories = Category::all();

        return view('welcome', compact('products', 'categories'));
    }

    // Product listing with category filter, search, and sort
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sort by price
        if ($request->sort === 'low_high') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'high_low') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest(); // Default: newest first
        }

        $products = $query->paginate(8);
        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }
}
