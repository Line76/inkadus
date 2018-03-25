<?php

use Faker\Generator as Faker;

$factory->define(\App\Enterprise::class, function (Faker $faker) {
    $name = $faker->company;

    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});
