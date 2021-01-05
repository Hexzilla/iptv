<?php

use Faker\Generator as Faker;

$factory->define(App\Device::class, function (Faker $faker) {
    $rooms = App\Category::pluck('id')->toArray();
    return [
        'device_id' => $faker->name,
        'device_name' => $faker->name,
        'device_type' => $faker->numberBetween(1, 3),
        'device_id' => $faker->name,
        'room_id' => $faker->randomElement($rooms),
    ];
});

