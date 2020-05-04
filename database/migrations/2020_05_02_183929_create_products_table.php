<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',300);
            $table->longText('description');
            $table->string('logo',300);
            $table->decimal('price', 11, 2);
            $table->integer('quantity');
            $table->string('condition',50);
            $table->smallInteger('stars');
            $table->decimal('shipping', 11, 2);
            $table->foreignId('category_id');
            $table->foreignId('store_id');
            $table->timestamps();
        });

        Schema::table('products', function($table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
