<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone_number')->unique();
            $table->string('post_code');
            $table->string('city');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->text('delivery_instruction')->nullable();
            $table->string('ownerable_type');
            $table->integer('ownerable_id');
            $table->integer('is_verified')->default(ACTIVE_STATUS_INACTIVE);
            $table->integer('is_default')->default(ACTIVE_STATUS_INACTIVE);
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
