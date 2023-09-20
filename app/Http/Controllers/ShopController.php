<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function category(Category $category) {
        // $category = Category::findOrFail($id);
        // dd($category->products);
        return view('shop.category', compact('category'));
    }
}