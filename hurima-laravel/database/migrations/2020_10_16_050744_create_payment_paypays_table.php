<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentPaypaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_paypays', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('code_id');
            $table->string('qr_url');

            $table->string('payment_id');
            $table->foreign('payment_id')
                    ->references('id')
                    ->on('orders');

            $table->string('status')->nullable();
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
        Schema::dropIfExists('payment_paypays');
    }
}
