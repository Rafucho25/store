<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categories = DB::table('categories')->get();
        $products = DB::table('products')->get();
        $newProducts = DB::table('products')->orderBy('created_at', 'desc')->take(3)->get();
        //return view('welcome',['categories' => $categories, 'products' => $products, 'newProducts' => $newProducts]);
        return view('welcome', compact('categories', 'products', 'newProducts'));
    }
}
