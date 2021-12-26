<?php

/** @var Factory $factory */

use App\Models\Admin\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['United States Dollar']),
        'symbol' => $faker->randomElement(['USD']),
        'deposit_status' => 3,
        'min_deposit' => 50,
        'is_active' => ACTIVE_STATUS_ACTIVE,
        'withdrawal_status' => 3,
        'min_withdrawal' => 100,
    ];
});
