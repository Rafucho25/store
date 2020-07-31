<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\Image;
use App\Model\Store;
use Illuminate\Http\Request;
use Facades\App\Http\Controllers\PDFController as PDF;
use DB;
use File;
use Sentinel;

class ProductController extends Controller
{

    public function index($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->get();
        $store = Store::find($product->store_id);
        return view('products',compact('product', 'images','store'));
    }

    public function indexapi()
    {
        $product = Product::all();
        return $product;
    }
    
    public function search(Request $request){
        $category = $request->category; 
        $text = $request->text;

        if ($category == null) {
            
            $listProducts = DB::table('products')
            ->where('name','REGEXP',$text)
            ->paginate(9);
        }else{
            
            $listProducts = DB::table('products')
            ->Where('category_id','=',$category)
            ->where('name','REGEXP',$text)
            ->paginate(9);
        }
        return view('search',['list' => $listProducts,'category' => $category, 'text' => $text]);
    }

    public function productCreate()
    {
        $categories = DB::table('categories')->pluck('description','id');
        return view('product.create',compact('categories'));
    }

    public function productStore(Request $request)
    {
        $store = DB::table('stores')->where('user_id', Sentinel::getUser()->id)->value('id');

        $product = Product::create(array_merge($request->all(), ['store_id' => $store]));

        $data = $request->all();

        if ($file = $request->file('logo')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/images/products/';
            $safeName = 'product_no_' . $product->id . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $data['logo'] = url('/').'/images/products/'.$safeName;
            $product->logo = $data['logo'];
        }
        $product->fill($data);
        $product->save();
    }

    public function productEdit($id)
    {
        $product = Product::find($id);
        $categories = DB::table('categories')->pluck('description','id');
        return view('product.edit',compact('product','categories'));
    }
    
    public function productUpdate($id, Request $request){

        $product = Product::find($id);
        $data = $request->all();

        if ($file = $request->file('logo')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/images/products/';
            $safeName = 'product_no_' . $product->id . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $data['logo'] = url('/').'/images/products/'.$safeName;
            $product->logo = $data['logo'];
        }
        $product->fill($data);
        $product->save();

        return redirect()->back()->with('messageSuccess', 'Cambios efectuado correctamente');
    }

    public function productDelete($id){

        $product = Product::find($id);
        $images = Image::where('product_id',$id)->get();

        $destinationPath = public_path() . '/images/products/';
        File::delete($destinationPath . $product->logo);

        foreach ($images as $img ) {
            File::delete($destinationPath . $img->path);
            $img->delete();
        }

        //$Image::where('product_id',$id)->delete();
        $product->delete();

        return redirect()->route('user.seller.store.index')->with('messageSuccess', 'Producto Eliminado correctamente');
    }

    public function print(Request $parameter)
    {
        return PDF::generatePDF($parameter);
    }
}
