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
Route::post('plan/update-or-add-plans', 'Api\V1\PlanController@updateOrAddPlans');
Route::post('campaign/update-campaign', 'Api\V1\CampaignController@updateCampaign');
Route::group(['middleware' => ['auth:api','scopes']], function () {

    Route::put('user/change-access-level', 'Api\V1\UserController@changeAccessLevel')->name('change.access_level');
    Route::put('user/change-status', 'Api\V1\UserController@changeStatus')->name('change.status');
    Route::resource('user', 'Api\V1\UserController')->except([
        'edit','destory','create'
    ]);

    Route::resource('job-bid', 'Api\V1\JobBidController')->except([
        'edit','create','destory'
    ]);

    Route::resource('job', 'Api\V1\JobController')->except([
        'edit','create','destory'
    ]);

    Route::resource('job-message', 'Api\V1\JobMessageController')->except([
        'edit','create','destory'
    ]);

    Route::resource('service', 'Api\V1\ServiceController')->except([
        'edit','create'
    ]);

    Route::resource('user-rating', 'Api\V1\UserRatingController')->except([
        'edit','create','destory'
    ]);

    Route::resource('service-provider-profile', 'Api\V1\ServiceProviderProfileController')->except([
        'edit','create','destory','store','update'
    ]);

    Route::resource('service-provider-profile-request', 'Api\V1\ServiceProviderProfileRequestController')->except([
        'edit','create','destory','store'
    ]);

    Route::resource('campaign', 'Api\V1\CampaignController')->only([
        'index', 'store', 'show',
    ]);

    Route::resource('plan', 'Api\V1\PlanController')->only([
        'index', 'show', 'update',
    ]);

    Route::resource('role', 'Api\V1\RoleController')->only([
        'index', 'show',
    ]);

    //Dashboard Report
    Route::get('dashboard', 'Api\V1\DashboardController@dashboard');

    Route::resource('support-inquiry', 'Api\V1\SupportInquiryController')->only([
        'index', 'store', 'show', 'update',
    ]);

    Route::resource('support-question', 'Api\V1\SupportQuestionController')->only([
        'index',
    ]);
    //Payment Listing
    Route::get('payment', 'Api\V1\PaymentController@index');
//Dashboard Report
Route::get('dashboard', 'Api\V1\DashboardController@dashboard')->name("dashboard");
//Uploading File
Route::post('file/upload', 'Api\V1\FileController@upload')->name("file.upload");
Route::post('file/remove', 'Api\V1\FileController@remove')->name("file.remove");
});

Route::resource('city', 'Api\V1\CityController')->only([
    'index', 'show',
]);

Route::resource('country', 'Api\V1\CountryController')->only([
    'index', 'show',
]);

Route::resource('state', 'Api\V1\StateController')->only([
    'index', 'show',
]);

