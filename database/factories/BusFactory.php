<?php

use Faker\Generator as Faker;

$factory->define(get_class(app('model.bus')), function () {
    // @TODO: populate this data to have some value
    // or by calling api
    return [
        'latitude'  => '32.9697',
        'longitude' => '-98.53506',
    ];
});
