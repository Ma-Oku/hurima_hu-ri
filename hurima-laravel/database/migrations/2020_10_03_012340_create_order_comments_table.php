<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_comments', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('order_id');
            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');

            $table->string('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            
            $table->string('order_comment');
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
        Schema::dropIfExists('order_comments');
    }
}
