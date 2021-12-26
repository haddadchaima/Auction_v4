<?php

/** @var Factory $factory */

use App\Models\Admin\Slider;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'images' => ['_slider_0.png', '_slider_1.png', '_slider_2.png'],
        'is_default' => ACTIVE_STATUS_ACTIVE,
    ];
});
