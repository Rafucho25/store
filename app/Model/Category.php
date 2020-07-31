<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'logo', 'description'
    ];

    public function products()
    {
        return $this->hasMany('App\Model\Product');
    }
}
