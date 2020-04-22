<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $roles = ['company', 'freelance'];

    $role = $roles[array_rand($roles)];

    return [
        'firstname' => $role == 'freelance' ? $faker->firstName : null,
        'lastname' => $role == 'freelance' ? $faker->lastName : null,
        'company_name' => $role == 'freelance' ? null : $faker->company,
        'identity'=> $role == 'freelance' ? null : $faker->numberBetween(100000, 999999),
        'employes'=> $role == 'freelance' ? null : $faker->numberBetween(10, 50),
        'working_hours'=> '0'.$faker->numberBetween(1, 9).':00 - '.$faker->numberBetween(10, 23).':00',
        'email' => $faker->unique()->safeEmail,
        'phone'=> $faker->phoneNumber,
        'image' => $role == 'freelance' ? null : $faker->imageUrl(),
        'cv' => $role == 'freelance' ? $faker->url : null,
        'role' => $role,
        'message' => $faker->paragraph(15),
        'status' => $faker->numberBetween(1, 2),
        'email_verified_at' => $faker->dateTime(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
