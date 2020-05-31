<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal', 11, 2);
            $table->decimal('tax', 11, 2)->default(0);
            $table->decimal('shipping', 11, 2);
            $table->date('payment_shipping')->nullable();
            $table->decimal('amount', 11, 2);
            $table->text('address');
            $table->char('status');
            $table->string('payment_method', 2)->default(0);
            $table->date('payment_date')->nullable();
            $table->integer('user_id');
            $table->integer('store_id');
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
