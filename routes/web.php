<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/encheres/{category?}', 'HomeController@allAuctionIndex')->name('auction.home');
Route::get('/encheres/type/{type?}', 'HomeController@allAuctionByTypeIndex')->name('auction-type.home');

Route::get('/contactez-nous', 'ContactUsController@create')->name('contact-us.create');
Route::post('/contactez-nous', 'ContactUsController@store')->name('contact-us.store');
Route::get('/enchere-regles', 'AuctionRulesController@index')->name('auction-rules.index');
Route::get('/encheres/recherche', 'AuctionSearchController@index')->name('auction-search.index');

Route::get('enchere/{id}', 'User\AuctionController@show')->name('auction.show');



/////////************ANGLAIS***************/
Route::get('/', 'HomeController@index')->name('home');
Route::get('auction/{id}', 'User\AuctionController@show')->name('auction.show');
Route::get('/auctions/search', 'AuctionSearchController@index')->name('auction-search.index');
Route::get('/auctions/{category?}', 'HomeController@allAuctionIndex')->name('auction.home');
Route::get('/auctions/type/{type?}', 'HomeController@allAuctionByTypeIndex')->name('auction-type.home');
Route::get('seller/auction/open/{id}', 'User\AuctionController@openManually' )->name('auction.open');
Route::get('seller/auction/stop/{id}/{date}', 'User\AuctionController@stopAuctionBid' )->name('auction.stop');
Route::get('seller/auction/show-timer/{id}', 'User\AuctionController@showTimer' )->name('auction.show-timer');
Route::get('seller/auction/true-timer/{id}', 'User\AuctionController@getTrueTimer' )->name('auction.true-timer');

Route::get('auction/session/{id}', 'User\AuctionController@auctionSession');


Route::get('/contact-us', 'ContactUsController@create')->name('contact-us.create');
Route::post('/contact-us', 'ContactUsController@store')->name('contact-us.store');
Route::get('/auction-rules', 'AuctionRulesController@index')->name('auction-rules.index');


//Test
Route::get('test', 'TestController@test')->name('test');
Route::get('test-websocket', 'TestController@testWebsocket')->name('test-websocket');
Route::post('tests', 'TestController@testPost')->name('testpost');
