<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('detail_id');
            $table->integer('detail_quantity');
            $table->unsignedBigInteger('order_id');
            
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('product_id')->references('product_id')->on('products');
            $table->unsignedBigInteger('product_id');
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
        Schema::dropIfExists('order_details');
    }
}
