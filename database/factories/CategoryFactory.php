<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'      => $faker->word,
        'parent_category_id' => null
    ];
});

$factory->state(App\Category::class, 'child', function ($faker) {
    return [
        'parent_category_id' => factory('App\Category')->create()->id,
    ];
});
