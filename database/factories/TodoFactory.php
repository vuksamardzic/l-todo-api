<?php

use Faker\Generator as Faker;

$factory->define(\App\Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'status' => $faker->randomElement(['incomplete', 'favourite', 'complete'])
    ];
});
