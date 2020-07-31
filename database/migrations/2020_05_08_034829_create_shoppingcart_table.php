<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingcart', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('user_id');
            $table->foreignId('product_id');
            $table->timestamps();
        });

        Schema::table('shoppingcart', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('shoppingcart', function($table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppingcart');
    }
}
