<?php

/** @var Factory $factory */

use App\Models\User\Bid;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Bid::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(2, 4),
        'amount' => $faker->numberBetween(110, 200),
        'is_winner' => AUCTION_WINNER_STATUS_LOSE,
    ];
});
