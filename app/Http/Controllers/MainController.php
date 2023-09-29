<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    function index(): View {
        $title = 'Main Page';
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

}
