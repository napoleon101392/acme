<?php

use Faker\Generator as Faker;

$factory->define(get_class(app('model.stop')), function (Faker $faker) {
    // @TODO: populate this data to have some value
    // or by calling api
    return [
        'name'      => $faker->name,
        'latitude'  => '29.46786',
        'longitude' => '14.000',
    ];
});
