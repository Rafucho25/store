<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{

    public function index($id)
    {
        $productDetail = Product::find($id);
        return view('products',compact('productDetail'));
    }
    
    public function search(Request $request){
        $category = $request->category; 
        $text = $request->text;

        if ($category == null) {
            
            $listProducts = DB::table('products')
            ->where('name','REGEXP',$text)
            ->paginate(10);
        }else{
            
            $listProducts = DB::table('products')
            ->Where('category_id','=',$category)
            ->where('name','REGEXP',$text)
            ->paginate(10);
        }
        return view('search',['list' => $listProducts,'category' => $category, 'text' => $text]);
    }
}
