<?php

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        "title" => $faker->name,
        "start_time" => $faker->date("Y-m-d H:i:s", $max = 'now'),
    ];
});
