<?php

use Faker\Generator as Faker;

$factory->define(Acme\Models\Bus::class, function () {
    return [
        'latitude'  => '32.9697',
        'longitude' => '-98.53506',
    ];
});
