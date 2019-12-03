<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\Category;
use App\Models\City;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    $category_id= Category::find(1);
    $city_id = City::find(1);
    return [
        'name' => $faker->name,
        'category_id' => $category_id,
        'city_id' => $city_id,
        'description'=>$faker->realText($maxNbChars = 100, $indexSize = 2),

    ];
});
