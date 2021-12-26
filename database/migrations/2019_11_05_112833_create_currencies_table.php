<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('symbol')->unique();
            $table->string('logo')->nullable();
            $table->integer('is_active');
            $table->integer('deposit_status')->default(PAYMENT_STATUS_PENDING);
            $table->integer('min_deposit')->default(0);
            $table->integer('withdrawal_status')->default(PAYMENT_STATUS_PENDING);
            $table->integer('min_withdrawal')->default(0);
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
        Schema::dropIfExists('currencies');
    }
}
