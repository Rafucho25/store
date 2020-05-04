<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL) ,
        'quantity' => $faker->numberBetween(0,20),
        'logo' => $faker->imageUrl,
    ];
});
