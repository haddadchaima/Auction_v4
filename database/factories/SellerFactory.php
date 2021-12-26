<?php

/** @var Factory $factory */

use App\Models\User\Seller;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Seller::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'ref_id' => $faker->md5,
        'description' => $faker->text(),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'is_active' => ACTIVE_STATUS_ACTIVE,
    ];
});
