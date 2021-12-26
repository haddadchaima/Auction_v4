<?php

Route::any('paypal/webhook', 'Api\WebHookController@paypalWebhook')->name('paypal.webhook');
