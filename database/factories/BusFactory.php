<?php

use Faker\Generator as Faker;

$factory->define(app('model.bus'), function () {
    return [
        'latitude'  => '32.9697',
        'longitude' => '-98.53506',
    ];
});
