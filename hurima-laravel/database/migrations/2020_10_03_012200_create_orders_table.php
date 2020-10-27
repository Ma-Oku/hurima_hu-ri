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
            $table->uuid('id')->primary();

            $table->string('buyer_id');
            $table->foreign('buyer_id')
                    ->references('id')
                    ->on('users');

            $table->string('buyer_name');
            $table->string('buyer_address');
            $table->string('buyer_postal_code');
            $table->string('buyer_phone_number');
            $table->string('buyer_comment')->nullable();
            $table->string('buyer_evaluate')->nullable();

            $table->string('seller_id');
            $table->foreign('seller_id')
                    ->references('id')
                    ->on('users');

            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_postal_code');
            $table->string('seller_phone_number');
            $table->string('seller_comment')->nullable();
            $table->string('seller_evaluate')->nullable();

            $table->string('product_id')->unique();
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products');

            $table->string('product_name');
            $table->integer('product_price');
            $table->float('trade_status',8,2)->default(0);
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
