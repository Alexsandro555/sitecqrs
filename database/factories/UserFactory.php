<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function(Faker $faker) {
  return [
    'title' => $faker->name,
    'url_key' => $faker->slug,
    'price' => $faker->randomFloat(NULL, 100,10000),
    'description' => $faker->paragraph(),
    'qty' => 1,
    'active' => 1,
    'sort' => 1,
    'onsale' => 1,
    'special' => 1,
    'need_order' => 1,
    'type_product_id' => 1,
    'producer_id' => 1,
    'producer_type_product_id' => 1
  ];
});
