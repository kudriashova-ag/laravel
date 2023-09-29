<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class Cart
{
   public static function add(Product $product, int $amount = 1){
    if(  Session::get("cart.$product->id")  ){
        Session::put("cart.$product->id.amount", Session::get("cart.$product->id.amount") + $amount);
    }
    else{
        $prod = [
            'id'=> $product->id,
            'name'=> $product->name,
            'price'=> $product->price,
            'image' => $product->image,
            'amount' => $amount,
        ];
        Session::put("cart.$product->id", $prod);
    }
   }
}
