<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $products =  factory(\App\Product::class,15)->create();

        $faker = Faker::create();
        $imageUrl =  $url = 'https://source.unsplash.com/random/1200x800';

        foreach($products as $product){
            $product->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        }
    }
}
