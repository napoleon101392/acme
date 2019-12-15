<?php

use Faker\Generator as Faker;

$factory->define(Acme\Models\Stop::class, function (Faker $faker) {
    return [
        'name'      => $faker->name,
        'latitude'  => '29.46786',
        'longitude' => '14.000',
    ];
});
