<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'en_title' => $faker->title,
        'ar_title' => $faker->title,
        'en_body' => $faker->text,
        'ar_body' => $faker->text,
        'logo' => $faker->imageUrl()
    ];
});
