<?php

Route::group(['namespace' => 'Api'], function ($router) {
    $router->post('/login', 'AuthController@login')->name('auth.login');

    Route::group(['middleware' => 'auth:api'], function ($router) {
        $router->post('/logout', 'AuthController@logout')->name('auth.logout');
        $router->match(['PUT', 'PATCH'], '/auth/user', 'UserController@update')->name('auth.update');
    });

    $router->get('/stops', 'StopController@index')->name('stop.index');
    $router->get('/random-location', 'GeneratorController@location')->name('random.location');
});
