<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class WishList extends Model
{
    protected $table = 'wishlists';

    public function product(){

        return $this->belongsTo(Product::class);
    }

}
