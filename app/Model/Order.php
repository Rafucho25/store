<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['subtotal', 'tax', 'shipping', 'amount', 'status', 'payment_method', 'payment_date', 'user_id', 
    'store_id', 'address'
    ];
}
