<?php

$factory->define(Acme\Models\User::class, function (Faker $faker) {
    return [
        'latitude'  => '32.9697',
        'longitude' => '-98.53506',
    ];
});
