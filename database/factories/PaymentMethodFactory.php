<?php

/** @var Factory $factory */

use App\Models\Admin\PaymentMethod;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'name' => 'PayPal',
        'api_service' => PAYMENT_METHOD_PAYPAL,
        'is_active' => ACTIVE_STATUS_ACTIVE,
    ];
});
