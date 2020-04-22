<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Application;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'status' => $faker->numberBetween(1, 4),
        'priority' => $faker->numberBetween(1, 3),
        'category_id' => rand(1, 20) > 10 ? Category::inRandomOrder()->first() : null,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'company' => $faker->company,
        'user_id' => rand(1, 20) > 10 ? User::inRandomOrder()->first() : null,
        'identity' => $faker->numberBetween(100000, 999999),
        'employes' => $faker->numberBetween(1, 20),
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'type' => $faker->word,
        'message' => $faker->paragraph(15),
    ];
});
