<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Agpretto\Articles\Tests\Fixtures\User;
use Agpretto\Articles\Article;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => Str::random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->text(95);

    return [
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
        'slug' => Str::slug($title, '-'),
        'title' => $title,
        'body' => $faker->text(750),
        'published_at' => null,
    ];
});
