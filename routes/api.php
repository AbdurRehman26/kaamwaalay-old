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
    'prefix' => 'auth'
], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
});

Route::post('plan/update-or-add-plans', 'Api\V1\PlanController@updateOrAddPlans');
Route::post('campaign/update-campaign', 'Api\V1\CampaignController@updateCampaign');



Route::group(['middleware' => ['auth:api']], function () {

    Route::resource('user', 'Api\V1\UserController')->except([
        'edit',
    ]);

    Route::resource('job-bid', 'Api\V1\JobBidController')->except([
        'edit',
    ]);

    Route::resource('job', 'Api\V1\JobController')->except([
        'edit',
    ]);

    Route::resource('job-message', 'Api\V1\JobMessageController')->except([
        'edit',
    ]);

    Route::resource('service', 'Api\V1\ServiceController')->except([
        'edit',
    ]);

    Route::resource('user-rating', 'Api\V1\UserRatingController')->except([
        'edit',
    ]);


});


Route::resource('campaign', 'Api\V1\CampaignController')->except([
    'edit',
]);

Route::resource('city', 'Api\V1\CityController')->except([
    'edit',
]);

Route::resource('country', 'Api\V1\CountryController')->except([
    'edit',
]);

Route::resource('payment', 'Api\V1\PaymentController')->except([
    'edit',
]);

Route::resource('plan', 'Api\V1\PlanController')->except([
    'edit',
]);

Route::resource('role', 'Api\V1\RoleController')->except([
    'edit',
]);

Route::resource('service-provider-profile-request', 'Api\V1\ServiceProviderProfileRequestController')->except([
    'edit',
]);

Route::resource('service-provider-profile', 'Api\V1\ServiceProviderProfileController')->except([
    'edit',
]);

Route::resource('service-provider-service', 'Api\V1\ServiceProviderServiceController')->except([
    'edit',
]);

Route::resource('state', 'Api\V1\StateController')->except([
    'edit',
]);

Route::resource('support-inquiry', 'Api\V1\SupportInquiryController')->except([
    'edit',
]);

Route::resource('support-question', 'Api\V1\SupportQuestionController')->except([
    'edit',
]);

Route::resource('testimonial', 'Api\V1\TestimonialController')->except([
    'edit',
]);

Route::resource('user-agent', 'Api\V1\UserAgentController')->except([
    'edit',
]);

Route::resource('zip-code', 'Api\V1\ZipCodeController')->except([
    'edit',
]);

//Uploading File
Route::post('file/upload', 'Api\V1\FileController@upload');
Route::post('file/remove', 'Api\V1\FileController@remove');

//Dashboard Report
Route::get('dashboard', 'Api\V1\DashboardController@dashboard');