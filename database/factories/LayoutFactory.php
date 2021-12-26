<?php

/** @var Factory $factory */

use App\Models\Admin\Layout;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Layout::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'layout_type' => $faker->numberBetween(1, 8),
        'total' => 6,
        'is_active' => $faker->numberBetween(0, 1),
    ];
});
