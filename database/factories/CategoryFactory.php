<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $arr = [
        'none' => '未分类',
        'ui' => '设计',
        'ue' => '前端',
        'weibo' => '微博'
    ];

    return [
        'title' => $faker->unique()->randomElement(array_keys($arr)),
        'name' => $faker->unique()->randomElement(array_values($arr))
    ];
});
