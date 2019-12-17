<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(get_class(app('model.user')), function (Faker $faker) {
    // @TODO: populate this data to have random information or email
    return [
        'name'              => $faker->name,
        'email'             => 'napoleon@example.com',
        'latitude'          => '103.817224802632',
        'longitude'         => '1.28210155945261',
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => Str::random(10),
    ];
});
