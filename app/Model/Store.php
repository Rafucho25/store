<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table='stores';

    protected $fillable = [
        'name', 'description', 'logo', 'email',
    ];
}
