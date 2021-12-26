<?php

/** @var Factory $factory */

use App\Models\User\KnowYourCustomer;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(KnowYourCustomer::class, function (Faker $faker) {
    return [
        'identification_type' => $faker->numberBetween(4,5),
        'verification_type' => VERIFICATION_TYPE_ADDRESS,
        'front_image' => 'preview.png',
        'back_image' => 'preview.png',
        'status' => ACTIVE_STATUS_ACTIVE,
    ];
});
