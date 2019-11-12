<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    $category_id= Category::find(1);
    return [
        'name' => $faker->name,
        'category_id' => $category_id
    ];
});
