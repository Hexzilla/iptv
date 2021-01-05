<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->define(App\Channel::class, function (Faker $faker) {
    $categories = App\Category::pluck('id')->toArray();
    return [
        'name' => $faker->firstName,
        'logo' => $faker->word,
        'url' => "http://www.exop.com/channels/" . $faker->firstName,
        'description' => $faker->text,
        'category_id' => $faker->randomElement($categories),
        'stream_id' => '1'
    ];
});