<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Category;
use App\Models\Product;
use App\Models\Samir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class MainController extends Controller
{
    function index(): View
    {

        $title = 'Main Page';

        // Mail::to('kudriashova.ag@gmail.com')->send(new TestMail($title));

        $latestProducts = Product::orderBy('created_at', 'desc')->limit(4)->get();

        //$products = Product::where('category_id', '=', 1)->orWhere('category_id', '=', 5)->get();
        //$products = DB::table('products')->where('category_id', '=', 1)->orWhere('category_id', '=', 5)->get();
        //dd($products[0]->image);

        return view('home', compact('title', 'latestProducts'));
    }

    function contacts(): View
    {
        return view('contacts');
    }

    function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        //dd($request->all());

        // send mail

        return redirect('/contacts')->with('success', 'Thank!');
    }


    function search(Request $request)
    {
        $s = $request->s;
        $products = Product::where('name', 'LIKE', "%$s%")->get();
        
        dd($products);

        return view('search', compact('products'));
    }
}
