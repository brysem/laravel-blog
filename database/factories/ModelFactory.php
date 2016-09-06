<?php

use App\Models\Post;

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {

    $title = $faker->sentence(5);
    $title = substr($title, 0, strlen($title) - 1);

    $status = [Post::STATUS_DRAFT, Post::STATUS_PUBLISHED];

    return [
        'title'   => $title,
        'content' => $faker->sentence(25),
        'user_id' => 1,
        'status' => $status[rand(0, 1)]
    ];
});
