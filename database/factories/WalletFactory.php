<?php

/** @var Factory $factory */

use App\Models\User\Wallet;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'balance' => $faker->numberBetween($min=5000, $max=10000),
        'on_order' => $faker->numberBetween($min=100, $max=300),
        'currency_id' => PAYMENT_METHOD_PAYPAL,
        'is_system' => ACTIVE_STATUS_INACTIVE,
    ];
});
