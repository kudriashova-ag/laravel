<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function store(Product $product) {
        Cart::add($product);
        return view('shop.cart');
    }
}
