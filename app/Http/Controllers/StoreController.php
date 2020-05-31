<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use File;
use Illuminate\Support\Str;
use App\Model\Store;

class StoreController extends Controller
{
    public function index($id){
        $store = Store::find($id);
        $products = DB::table('products')->where('store_id', $store->id)->get();
        $store = DB::table('stores')->where('user_id',Sentinel::getUser()->store_id)->first()->id;
        $orders = DB::table('orders')
        ->where('store_id',$store)
        ->paginate(10);
        $orderDetail = DB::table('orderdetails')
        ->whereIn('order_id',$orders->pluck('id')->toArray())
        ->get();

        return view('store',compact('store', 'products','orders','orderDetail'));
    }

    public function manage(){
        $store = Store::where('user_id',Sentinel::getUser()->id)->first()->id;
        $products = DB::table('products')->where('store_id', $store)->get();
        $orders = DB::table('orders')
        ->where('store_id',$store)
        ->join('users','users.id','orders.user_id')
        ->selectRaw("orders.id as id, CONCAT(users.first_name, ' ', users.last_name) as names, orders.created_at as date, subtotal, amount, shipping, status")
        ->get();

        return view('store.index',compact('store', 'products','orders'));
    }

    

    public function update($id, Request $request){

        $store = Store::find($id);
        $data = $request->all();

        if ($file = $request->file('photo')) {
            $extension = $file->extension()?: 'png';
            $destinationPath = public_path() . '/images/store/';
            $safeName = 'store_no_' . $store->id . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $data['photo'] = url('/').'/images/store/'.$safeName;
        }
        $store->logo = $data['photo'];
        $store->fill($data);
        $store->save();

        return redirect()->back()->with('messageSuccess', 'Cambios efectuado correctamente');
    }
}
