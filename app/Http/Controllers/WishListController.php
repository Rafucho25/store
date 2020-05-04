<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\WishList;
use Sentinel;

class WishListController extends Controller
{
    public function add($idproducto){
        
        $wishList = new WishList;
        $wishList->user_id = Sentinel::getUser()->id;
        $wishList->product_id = $idproducto;
        $wishList->save();
    }
}
