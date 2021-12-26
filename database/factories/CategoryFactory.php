<?php

/** @var Factory $factory */

use App\Models\Admin\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {

    $categoryName = $faker->word;

    return [
        'name' => $categoryName,
        'slug' => Str::slug($categoryName),
    ];
});
