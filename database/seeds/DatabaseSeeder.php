<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'description' => $faker->text,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL) ,
                'quantity' => $faker->numberBetween(0,20),
                'logo' => $faker->imageUrl($width, $height),
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
            ]);
        }

        foreach (range(1,10) as $index) {
            DB::table('categories')->insert([
                'description' => $faker->text,
                'logo' => $faker->imageUrl($width, $height),
            ]);
        }
    }
}
