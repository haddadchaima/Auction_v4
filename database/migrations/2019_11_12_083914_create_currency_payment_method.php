<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyPaymentMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_payment_method', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('payment_method_id')->unsigned();

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_payment_method');
    }
}
