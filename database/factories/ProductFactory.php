<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use App\Brand;
use Faker\Generator as Faker;




$factory->define(Product::class, function (Faker $faker) {
    $categories = Category::WhereNotNull('parent_category_id')->pluck('id');
    $brands = Brand::pluck('id');

    $imageUrl = $faker->imageUrl(640,480, null, false);
    return [
        'name'        => $faker->name,
        'description' => $faker->text(200),
        'category_id' => $faker->randomElement($categories),
        'brand_id'    => $faker->randomElement($brands),
        'price'       => $faker->numberBetween(50,6000),
    ];

});


