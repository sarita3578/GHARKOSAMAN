<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function showProducts($id)
{
    $category = Category::with('products')->findOrFail($id);
    $products = $category->products;
    $categories = \App\Models\Category::all(); // ✅ add this line

    return view('categories.index', compact('category', 'products', 'categories'));
}

}

