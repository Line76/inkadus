<?php

use Faker\Generator as Faker;

$factory->define(\App\Skill::class, function (Faker $faker) {
    return [
        'label' => $faker->words(2, true)
    ];
});
