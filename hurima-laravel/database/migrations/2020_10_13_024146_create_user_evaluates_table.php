<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEvaluatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_evaluates', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('valuer_id');
            $table->foreign('valuer_id')
                    ->references('id')
                    ->on('users');

            $table->string('evaluatee_id');
            $table->foreign('evaluatee_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->string('comment')->nullable();
            $table->string('evaluate');
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
        Schema::dropIfExists('user_evaluates');
    }
}
