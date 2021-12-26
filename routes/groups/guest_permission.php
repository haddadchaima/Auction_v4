<?php
use Illuminate\Support\Facades\Route;

Route::get('login','Guest\AuthController@loginForm')->name('login');
Route::post('login','Guest\AuthController@adminLogin')->name('admin-login');
Route::post('/','Guest\AuthController@login')->name('user-login');
Route::post('register/store','Guest\AuthController@storeUser')->name('register.store')->middleware('registration.permission');
Route::get('forget-password','Guest\AuthController@forgetPassword')->name('forget-password.index');
Route::post('forget-password/send-mail','Guest\AuthController@sendPasswordResetMail')->name('forget-password.send-mail');
Route::get('reset-password/{id}','Guest\AuthController@resetPassword')->name('reset-password.index');
Route::post('reset-password/{id}/update','Guest\AuthController@updatePassword')->name('reset-password.update');
