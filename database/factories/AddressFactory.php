<?php

/** @var Factory $factory */

use App\Models\User\Address;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'post_code' => $faker->postcode,
        'city' => $faker->city,
        'country_id' => $faker->numberBetween($min=1, $max =200),
        'state_id' => $faker->numberBetween($min=1, $max =300),
        'delivery_instruction' => $faker->text,
        'is_verified' => $faker->numberBetween($min=1, $max =2),
        'is_default' => $faker->numberBetween($min=1, $max =2),
    ];
});
