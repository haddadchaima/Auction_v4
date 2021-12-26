<?php
/** @var Factory $factory */

use App\Models\Core\SystemNotice;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SystemNotice::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'type' => $faker->randomElement(['success', 'warning', 'danger', 'info']),
        'start_at' => $faker->dateTimeThisYear,
        'end_at' => $faker->dateTimeThisYear,
        'is_active' => $faker->boolean,
        'created_by' => FIXED_USER_SUPER_ADMIN
    ];
});
