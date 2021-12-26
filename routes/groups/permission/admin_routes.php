<?php

Route::prefix('backend')->namespace('Admin')->group(function () {

    Route::Resource('categories', 'CategoryController')->names('category')->parameter('categories', 'id');
    Route::Resource('currencies', 'CurrencyController')->names('currency')->parameter('currencies', 'id');
    Route::Resource('payment-methods', 'PaymentMethodController')->names('payment-method')->parameter('payment-methods', 'id');

    Route::get('verification-with-id/{type?}', 'VerificationController@verificationWithIdIndex')->name('verification-with-id.index');

    Route::get('verification-with-address/{type?}', 'VerificationController@verificationWithAddressIndex')->name('verification-with-address.index');

    Route::get('transactions/{system_transaction_type?}', 'TransactionHistoryController@index')->name('admin-transaction-history.index');

    Route::get('verification/{id}/review', 'VerificationController@edit')->name('verification-status.edit');
    Route::put('verification/{id}/review', 'VerificationController@changeStatus')->name('verification-status.change');

    Route::delete('verification/{id}/delete', 'VerificationController@destroy')->name('verification-status.destroy');

    Route::get('admin/auctions', 'AuctionController@index' )->name('admin-auction.index');
    Route::get('auctions/completed', 'AuctionController@completedAuctions' )->name('completed-auction.index');
    Route::get('admin-auction/{id}', 'AuctionController@show' )->name('admin-auction.show');

    Route::put('auction/completed/{id}', 'AuctionController@releaseSellerMoney' )->name('admin-release-money.update');


    Route::get('disputes/{id}/show', 'DisputeController@edit')->name('admin-dispute.edit');
    Route::get('disputes/{id}/read', 'DisputeController@markAsRead')->name('admin-dispute.mark-as-read');
    Route::get('disputes/{id}/unread', 'DisputeController@markAsUnread')->name('admin-dispute.mark-as-unread');
    Route::put('disputes/{id}/change-status', 'DisputeController@changeDisputeStatus')->name('admin-change-dispute-status.update');
    Route::get('disputes/{type?}', 'DisputeController@index')->name('admin-dispute.index');

    Route::put('slider/status/{id}', 'SliderController@makeSliderDefault')->name('slider-make-default.update');
    Route::Resource('slider', 'SliderController')->names('slider')->parameter('slider', 'id');

    Route::put('layout/change-status/{id}', 'LayoutController@makeLayoutActive')->name('layout-make-active.update');
    Route::Resource('layout', 'LayoutController')->names('layout')->parameter('layout', 'id')->except(['show', 'destroy']);
});

