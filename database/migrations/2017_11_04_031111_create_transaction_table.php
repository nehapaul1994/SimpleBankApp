<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_act');
            $table->integer('to_act');
            $table->integer('trans_type');
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('from_act')->references('id')->on('account')->onDelete('cascade');
            $table->foreign('to_act')->references('id')->on('account')->onDelete('cascade');
            $table->foreign('trans_type')->references('id')->on('transaction_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction');
    }
}
