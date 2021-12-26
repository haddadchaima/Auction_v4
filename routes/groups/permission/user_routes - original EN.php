<?php

Route::namespace('User')->group(function () {

//   User Verifications Controllers
    Route::get('profile/verification', 'VerificationController@Index')->name('profile-verification.index');
    Route::get('profile/verification-with-id', 'VerificationController@verificationWithIdIndex')->name('profile-verification-with-id.index');

    Route::get('profile/verification/upload-id', 'VerificationController@createWithId')->name('profile-verification-with-id.create');
    Route::post('profile/verification/upload-id', 'VerificationController@verificationWithIdStore')->name('profile-verification-with-id.store');

    Route::get('profile/verification/upload-address', 'VerificationController@createWithAddress')->name('profile-verification-with-address.create');
    Route::post('profile/verification/upload-address', 'VerificationController@verificationWithAddressStore')->name('profile-verification-with-address.store');

//   Seller Verifications Controllers
    Route::get('manage-store/verification', 'SellerVerificationController@Index')->name('seller-verification.index');

    Route::get('manage-store/verification/upload-id', 'SellerVerificationController@createWithId')->name('seller-verification-with-id.create');
    Route::post('manage-store/verification/upload-id', 'SellerVerificationController@verificationWithIdStore')->name('seller-verification-with-id.store');

    Route::get('manage-store/verification/upload-address', 'SellerVerificationController@createWithAddress')->name('seller-verification-with-address.create');
    Route::post('manage-store/verification/upload-address', 'SellerVerificationController@verificationWithAddressStore')->name('seller-verification-with-address.store');

//    Buyer Profile controllers
    Route::get('profile','UserProfileController@userIndex')->name('user-profile.index');
    Route::get('profile/won','UserProfileController@userWonAuctionIndex')->name('user-profile-won-auction.index');

    Route::get('profile/manage-profile','UserProfileController@index')->name('user-manage-profile.index');

    Route::get('profile/edit', 'UserProfileController@edit')->name('user-profile.edit');
    Route::put('profile/update', 'UserProfileController@update')->name('user-profile.update');
    Route::get('profile/change-password', 'UserProfileController@changePassword')->name('user-profile.change-password');
    Route::put('profile/change-password/update', 'UserProfileController@updatePassword')->name('user-profile.update-password');

    Route::get('profile/avatar/edit','UserProfileController@avatarEdit')->name('user-profile.avatar.edit');
    Route::put('profile/avatar/update','UserProfileController@avatarUpdate')->name('user-profile.avatar.update');

//    Seller Profile Controllers
    Route::resource('stores','Seller\StoreController')->names('seller-profile')->parameter('stores', 'id')->except('show');
    Route::get('store/{status?}','Seller\StoreController@sellerIndex')->name('seller-profile.index');
    Route::get('profile/{id}/seller/{status?}','Seller\StoreController@show')->name('seller-profile.show');

//    Store Management Controllers
    Route::get('manage-store', 'Seller\StoreManagementController@index')->name('store-management.index');
    Route::resource('manage-store/address', 'AddressController')->names('address')->parameter('address', 'id');


    Route::post('country', 'AddressController@getStateByCountry')->name('get-state.index');
    Route::put('manage-store/address/{id}', 'AddressController@makeAddressDefault')->name('change-address-status.update');

//    User Address management
    Route::resource('profile/address', 'UserAddressController')->names('user-address')->parameter('address', 'id');
    Route::put('address/{id}', 'UserAddressController@makeAddressDefault')->name('user-change-address-status.update');

//    Auction
    Route::get('seller/auction/create', 'AuctionController@create')->name('auction.create');
    Route::post('seller/auction/store', 'AuctionController@store')->name('auction.store');

    Route::put('shipping-status/auction/{id}', 'AuctionController@updateShippingStatusFromSeller')->name('update-shipping-status.update');
    Route::put('shipping-status/auction/{id}/shipping-status', 'AuctionController@updateShippingStatusFromUser')->name('update-shipping-status-user.update');
    Route::get('profile/auction/{id}/shipping-description', 'AuctionController@shippingDescriptionCreate')->name('shipping-description.create');
    Route::post('profile/auction/{id}/shipping-description', 'AuctionController@shippingDescriptionUpdate')->name('shipping-description.update');

//    Bidding controller
    Route::post('bid/{auctionId}', 'BidController@store')->name('bid.store');

//    Comment controller
    Route::post('comment/{auctionId}', 'CommentController@store')->name('comment.store');
    Route::resource('comment', 'CommentController')->names('comment')->parameter('comment', 'id')->except('store');

//    Notification controller
    Route::get('profile/notifications', 'UserNotificationController@index')->name('notification.index');
    Route::get('profile/{id}/read','UserNotificationController@markAsRead')->name('notification.mark-as-read');
    Route::get('profile/{id}/unread','UserNotificationController@markAsUnread')->name('notification.mark-as-unread');

    //dispute controller
    Route::resource('dispute', 'DisputeController')->names('dispute')->parameter('dispute', 'id')->only(['create', 'store']);
    Route::get('specific-dispute/{dispute_type}/{ref_id}' , 'DisputeController@specific')->name('disputes.specific');
    Route::get('dispute/{type?}' , 'DisputeController@index')->name('dispute.index');

    Route::get('user-disputes/{id}/read', 'DisputeController@markAsRead')->name('dispute.mark-as-read');
    Route::get('user-disputes/{id}/unread', 'DisputeController@markAsUnread')->name('dispute.mark-as-unread');

});

Route::namespace('Transaction')->group(function () {

    //wallet history route
    Route::get('payment-method/paypal/completed', 'WalletTransactionController@paypalReturnUrl')->name('paypal.return-url');
    Route::get('payment-method/paypal/cancel', 'WalletTransactionController@paypalCancelUrl')->name('paypal.cancel-url');
    Route::get('profile/deposit/{id}/create', 'WalletTransactionController@create')->name('wallet-deposit.create');
    Route::post('profile/deposit/{id}/store', 'WalletTransactionController@store')->name('wallet-deposit.store');
    Route::get('profile/deposit-history/{payment_status?}', 'WalletTransactionController@index')->name('deposit.index');

    Route::get('profile/currencies', 'WalletController@index')->name('user-currency.index');

    //to show transactions
    Route::get('profile/transactions/{user_transaction_type?}', 'TransactionHistoryController@index')->name('transaction-history');

    //to withdrawal money
    Route::post('profile/withdrawal/{id}/store', 'WithdrawalController@store')->name('withdrawal-form.store');
    Route::get('profile/withdrawal/{id}/create', 'WithdrawalController@create')->name('withdrawal-form');
    Route::get('profile/withdrawal-history/{payment_status?}', 'WithdrawalController@index')->name('withdrawal.index');

});
