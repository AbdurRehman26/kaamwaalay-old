<?php

//Route::apiResource('users', 'Api\UserController');

Route::group([
    'prefix' => 'auth'
], function () {  
    Route::put('change/password', 'Api\V1\UserController@changePassword');
    Route::post('logout', 'Auth\LoginController@logout');
});
