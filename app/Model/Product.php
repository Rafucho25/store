<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'logo', 'description', 'category_id', 'price', 'quantity', 'shipping', 'condition', 'store_id'
    ];

}
