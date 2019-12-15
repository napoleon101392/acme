<?php

$factory->define(Acme\Models\Stop::class, function (Faker $faker) {
    return [
        'name'      => $fake->name,
        'latitude'  => '29.46786',
        'longitude' => '14.000',
    ];
});
