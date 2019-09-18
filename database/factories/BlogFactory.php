<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,10),
        'title' => $faker->sentence(5, true),//返回一个句子，false表示只能含有5个单词，true表示可以在5个单词左右,
        'name' => $faker->unique()->word,
        'content' => $faker->text(),

    ];
});
