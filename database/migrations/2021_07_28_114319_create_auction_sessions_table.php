<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('session_date');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_sessions');
    }
}
