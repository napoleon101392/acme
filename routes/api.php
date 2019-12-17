<?php

Route::group(['namespace' => 'Api'], function ($router) {
    $router->post('/login', 'AuthController@login');
    $router->get('/stops', 'StopController@index');
});
