<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    \Cache::flush();
    dd('cache cleared');
});

Route::get('/', function () {
    return view('layout');
});


/*Route::get('/{any}', function(){
    return view('layout');
})->where('any', '.*');*/
Route::post('social/login', 'Api\V1\UserController@socialLogin')->name('socialLogin');
Route::get('activate', 'Auth\LoginController@activateUser')->name('activate');
Route::get('password/set/{token}/{email}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');

/*Admin Route*/
Route::get('/admin{any}', 'AdminController@index')->where('any', '.*');


/*Front Route*/
Route::get('/{any}', 'FrontController@index')->where('any', '.*');
Route::get('/', 'FrontController@index')->where('any', '.*');
