<?php

Route::group(['namespace' => 'Api'], function ($router) {
    $router->post('/login', 'AuthController@login')->name('auth.login');

    $router->post('/logout', 'AuthController@logout')->name('auth.logout')->middleware('auth:api');
    $router->get('/stops', 'StopController@index')->name('stop.index')->middleware('auth:api');
    $router->get('/random-location', 'GeneratorController@location')->name('random.location')->middleware('auth:api');

    $router->match(['PUT', 'PATCH'], '/auth/user', 'UserController@update')->name('auth.update')->middleware('auth:api');
});
