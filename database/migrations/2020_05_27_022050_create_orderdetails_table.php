<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->decimal('price', 11, 2);
            $table->integer('quantity');
            $table->string('condition',50);
            $table->decimal('shipping', 11, 2);
            $table->timestamps();
        });
        
        Schema::table('orderdetails', function($table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });
        
        Schema::table('orderdetails', function($table) {
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
