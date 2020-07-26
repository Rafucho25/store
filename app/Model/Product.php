<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'logo', 'description', 'category_id', 'price', 'quantity', 'shipping', 'condition', 'store_id'
    ];

    public function category(){
        return $this->belongsTo ('App\Model\Category');
        //return $this->belongsTo ('App\Model\Category', 'category_id', 'id');
    }
}
