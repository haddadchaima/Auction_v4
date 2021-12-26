<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', 'User\DashboardController')->name('dashboard');

//User Group Role
Route::resource('roles', 'Core\RoleController')->parameter('roles','id')->except(['show']);
Route::put('roles/{id}/change-status', 'Core\RoleController@changeStatus')->name('roles.status');
//User Managements
Route::get('users/{id}/edit/status', 'User\UsersController@editStatus')->name('users.edit.status');
Route::put('users/{id}/update/status', 'User\UsersController@updateStatus')->name('users.update.status');
Route::resource('users', 'User\UsersController')->parameter('users','id');
//User profile
Route::get('backend/profile', 'User\ProfileController@index')->name('profile.index');
Route::get('backend/profile/edit', 'User\ProfileController@edit')->name('profile.edit');
Route::put('backend/profile/update', 'User\ProfileController@update')->name('profile.update');
Route::get('backend/profile/change-password', 'User\ProfileController@changePassword')->name('profile.change-password');
Route::put('backend/profile/change-password/update', 'User\ProfileController@updatePassword')->name('profile.update-password');
Route::get('backend/profile/avatar/edit','User\ProfileController@avatarEdit')->name('profile.avatar.edit');
Route::put('backend/profile/avatar/update','User\ProfileController@avatarUpdate')->name('profile.avatar.update');

//Application Setting
Route::get('application-settings/{type?}', 'Core\ApplicationSettingController@index')->name('application-settings.index');
Route::get('application-settings/{type}/edit', 'Core\ApplicationSettingController@edit')->name('application-settings.edit');
Route::put('application-settings/{type}/update', 'Core\ApplicationSettingController@update')->name('application-settings.update');

//Admin Notice
Route::resource('system-notices', 'Core\SystemNoticeController')->except(['show'])->parameter('system-notices','id');
Route::get('system-notices/show/{id}', 'Core\SystemNoticeController@show')->name('system-notices.show');

//User Specific Notice
Route::get('notices','User\NotificationController@index')->name('notices.index');
Route::get('notices/{id}/read','User\NotificationController@markAsRead')->name('notices.mark-as-read');
Route::get('notices/{id}/unread','User\NotificationController@markAsUnread')->name('notices.mark-as-unread');

Route::get('logout', 'Guest\AuthController@logout')->name('logout');

Route::get('menu-manager/{menu_slug?}', 'Core\NavController@index')->name('menu-manager.index');
Route::post('menu-manager/{menu_slug?}/save', 'Core\NavController@save')->name('menu-manager.save');

//Laravel Log Viewer
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs.index');

//Language
Route::get('languages/settings', 'Core\LanguageController@settings')->name('languages.settings');
Route::get('languages/translations', 'Core\LanguageController@getTranslation')->name('languages.translations');
Route::put('languages/settings', 'Core\LanguageController@settingsUpdate')->name('languages.update.settings');
Route::put('languages/sync', 'Core\LanguageController@sync')->name('languages.sync');
Route::resource('languages', 'Core\LanguageController')->parameter('languages','id')->except('show');
