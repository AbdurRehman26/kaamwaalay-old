<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API   Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API    routes for your application. These
|   routes are loaded by the  RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'auth','scopes'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('login/admin', 'Auth\LoginController@adminLogin');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');

});

Route::resource('service-provider-profile', 'Api\V1\ServiceProviderProfileController')->except([
    'edit','create','destory','store','update'
]);

Route::resource('service', 'Api\V1\ServiceController')->except([
    'edit', 'create', 'store', 'update' 
]);

Route::resource('city', 'Api\V1\CityController')->only([
    'index', 'show',
]);

Route::resource('country', 'Api\V1\CountryController')->only([
    'index', 'show',
]);

Route::resource('state', 'Api\V1\StateController')->only([
    'index', 'show',
]);

Route::resource('testimonial', 'Api\V1\TestimonialController')->only([
    'index', 'show',
]);