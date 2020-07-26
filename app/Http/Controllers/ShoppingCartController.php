<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Shoppingcart;
use DB;
use Sentinel;

class ShoppingCartController extends Controller
{
    public function index(){
        $cart = DB::table('shoppingcart')
        ->where('user_id',Sentinel::getUser()->id)
        ->join('products','products.id','product_id')
        ->selectRaw("shoppingcart.id as id, shoppingcart.quantity as quantity, logo, name, price, product_id, `condition`")
        ->get();
        return view('cart',compact('cart'));
    }

    public function add($idproducto, $quantity){
        
        $cart = new Shoppingcart;
        $validate = DB::table('shoppingcart')->where('user_id',Sentinel::getUser()->id)->where('product_id',$idproducto)->first();
        if($validate === null){
            $cart->user_id = Sentinel::getUser()->id;
            $cart->product_id = $idproducto;
            $cart->quantity = $quantity;
            $cart->save();
            return false;
        }else{
            return true;
        }
    }

    public function remove($id){
        
        $cart = Shoppingcart::find($id)->delete();
    }

    public function buy(){

    }
}
