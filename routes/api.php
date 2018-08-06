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

Route::resource('user', 'Api\V1\UserController')->except([
    'index', 'edit'
]);

Route::resource('campaign', 'Api\V1\CampaignController')->except([
    'index', 'edit'
]);

Route::resource('city', 'Api\V1\CityController')->except([
    'index', 'edit'
]);

Route::resource('country', 'Api\V1\CountryController')->except([
    'index', 'edit'
]);

Route::resource('jobbid', 'Api\V1\JobBidController')->except([
    'index', 'edit'
]);

Route::resource('jobmessage', 'Api\V1\JobMessageController')->except([
    'index', 'edit'
]);

Route::resource('job', 'Api\V1\JobController')->except([
    'index', 'edit'
]);

Route::resource('notification', 'Api\V1\NotificationController')->except([
    'index', 'edit'
]);

Route::resource('payment', 'Api\V1\PaymentController')->except([
    'index', 'edit'
]);

Route::resource('plan', 'Api\V1\PlanController')->except([
    'index', 'edit'
]);

Route::resource('role', 'Api\V1\RoleController')->except([
    'index', 'edit'
]);

Route::resource('service', 'Api\V1\ServiceController')->except([
    'index', 'edit'
]);

Route::resource('state', 'Api\V1\StateController')->except([
    'index', 'edit'
]);

Route::resource('supportquestiontype', 'Api\V1\SupportQuestionTypeController')->except([
    'index', 'edit'
]);

Route::resource('supportquestion', 'Api\V1\SupportQuestionController')->except([
    'index', 'edit'
]);

Route::resource('testimonial', 'Api\V1\TestimonialController')->except([
    'index', 'edit'
]);

Route::resource('useragent', 'Api\V1\UserAgentController')->except([
    'index', 'edit'
]);

Route::resource('userprofile', 'Api\V1\UserProfileController')->except([
    'index', 'edit'
]);

Route::resource('userrating', 'Api\V1\UserRatingController')->except([
    'index', 'edit'
]);

Route::resource('userservicereject', 'Api\V1\UserServiceRejectController')->except([
    'index', 'edit'
]);

Route::resource('userservice', 'Api\V1\UserServiceController')->except([
    'index', 'edit'
]);

Route::resource('zipcode', 'Api\V1\ZipCodeController')->except([
    'index', 'edit'
]);

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
});
