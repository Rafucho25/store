<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\WishList;
use Sentinel;
use DB;

class WishListController extends Controller
{
    public function index(){
        /*$Wish = WishList::find(1);
        $wishList = $WishList->product;*/
        $wishList = DB::table('wishlists')
        ->where('user_id',Sentinel::getUser()->id)
        ->join('products','products.id','product_id')
        ->selectRaw("wishlists.id as id, logo, name, price, product_id, `condition`, products.description as description")
        ->get();
        /*$wishList = WishList::find(1)->product; */
        return view('user.wishlist',compact('wishList'));
    }

    public function add($idproducto){
        
        $wishList = new Wishlist;
        $validate = DB::table('wishlists')->where('user_id',Sentinel::getUser()->id)->where('product_id',$idproducto)->first();
        if($validate === null){
            $wishList->user_id = Sentinel::getUser()->id;
            $wishList->product_id = $idproducto;
            $wishList->save();
            return false;
        }else{
            return true;
        }
    }

    public function remove($id){
        
        $wishList = DB::table('wishlists')
        ->where('id',$id)
        ->delete();
    }
}
