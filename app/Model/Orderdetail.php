<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orderdetails';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'condition', 'price', 'shipping'];
}
