<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category; // Make sure you have a Category model

class AdminCategoryController extends Controller
{
    public function index() {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
}

public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create(['name' => $request->name]);

        return redirect()->route('admin.dashboard')->with('success', 'Category added.');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Category deleted.');
    }
}