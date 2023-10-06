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

    self::totalSum();
   }

   public static function delete(Product $product){
    Session::forget("cart.$product->id");
    self::totalSum();
   }

   private static function totalSum(){
        $sum = 0;
        foreach(Session::get('cart') as $product){
            $sum+= $product['price'] * $product['amount'];
        }
        Session::put('totalSum', $sum);
   }



    public static function changeAmount(int $productId, int $amount)
    {
        Session::put("cart.$productId.amount", $amount);
        self::totalSum();
    }


}
