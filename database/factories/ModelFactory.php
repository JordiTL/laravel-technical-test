<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->defineAs(App\User::class, 'random',function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'default', function ($faker) {
    return [
        'name' => 'user',
        'email' => 'user@test.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(1),
        'price' => $faker->randomNumber(2),
        'image' => $faker->imageUrl(),
    ];
});
