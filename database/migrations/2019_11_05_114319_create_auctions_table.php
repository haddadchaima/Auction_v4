<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('ref_id');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->integer('auction_type');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->dateTime('delivery_date')->nullable();
            $table->integer('bid_initial_price');
            $table->integer('bid_increment_dif')->nullable();
            $table->integer('prix_reserve');
            $table->integer('nbr_stock');
            $table->integr('nbr_inscripteur_requise');
            $table->text('product_description');
            $table->text('images')->nullable();
            $table->integer('is_shippable');
            $table->integer('shipping_type');
            $table->text('shipping_description')->nullable();
            $table->text('terms_description')->nullable();
            $table->integer('status')->default(AUCTION_STATUS_RUNNING);
            $table->integer('product_claim_status')->nullable()->default(AUCTION_PRODUCT_CLAIM_STATUS_NOT_DELIVERED_YET);
            $table->integer('is_multiple_bid_allowed');
            $table->double('time_bid_chrono');
            $table->double('time_waiting_bid');
            $table->double('auction_session');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
