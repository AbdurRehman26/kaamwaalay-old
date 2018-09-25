<?php

//Route::apiResource('users', 'Api\UserController');

Route::group([
    'prefix' => 'auth'
], function () {  
    Route::put('change/password', 'Api\V1\UserController@changePassword');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => ['scopes']], function () {

    Route::post('campaign/update-campaign', 'Api\V1\CampaignController@updateCampaign');
    Route::resource('campaign', 'Api\V1\CampaignController')->only([
        'index', 'store', 'show',
    ]);

    Route::get('dashboard', 'Api\V1\DashboardController@dashboard')->name("dashboard");

    //Uploading File
    Route::post('file/upload', 'Api\V1\FileController@upload')->name("file.upload");
    Route::post('file/remove', 'Api\V1\FileController@remove')->name("file.remove");

    Route::resource('job-bid', 'Api\V1\JobBidController')->except([
        'edit','create','destory'
    ]);

    Route::get('job/stats', 'Api\V1\JobController@getJobStats')->name('job.stats');
    Route::resource('job', 'Api\V1\JobController')->except([
        'edit','create','destory'
    ]);

    Route::resource('job-message', 'Api\V1\JobMessageController')->except([
        'edit','create','destory'
    ]);

    Route::resource('payment', 'Api\V1\PaymentController')->except([
     'edit','create','destory'
 ]);

    Route::post('plan/update-or-add-plans', 'Api\V1\PlanController@updateOrAddPlans');
    Route::resource('plan', 'Api\V1\PlanController')->except([
        'edit','create'
    ]);

    Route::resource('role', 'Api\V1\RoleController')->only([
        'index', 'show',
    ]);

    Route::resource('service-provider-profile', 'Api\V1\ServiceProviderProfileController')->only([
        'update'
    ]);

    Route::get('service-provider-profile-request/approved-profile', 'Api\V1\ServiceProviderProfileRequestController@getUserApprovedProfile')->name("service-provider.approved-profile");
    Route::resource('service-provider-profile-request', 'Api\V1\ServiceProviderProfileRequestController')->except([
        'edit','create','destory','store'
    ]);

    Route::resource('service', 'Api\V1\ServiceController')->only([
        'store', 'update' 
    ]);

    Route::resource('support-inquiry', 'Api\V1\SupportInquiryController')->only([
        'index', 'store', 'show', 'update',
    ]);

    Route::resource('support-question', 'Api\V1\SupportQuestionController')->only([
        'index',
    ]);

    Route::put('user/change-access-level', 'Api\V1\UserController@changeAccessLevel')->name('change.access_level');
    Route::put('user/change-status', 'Api\V1\UserController@changeStatus')->name('change.status');
    Route::get('user/get-notification', 'Api\V1\UserController@getUserNotification')->name('user.notification');
    Route::get('user/me', 'Api\V1\UserController@getAuthUser')->name('user.me');
    Route::resource('user', 'Api\V1\UserController')->except([
        'edit','destory','create'
    ]);
    
    Route::resource('user-rating', 'Api\V1\UserRatingController')->except([
        'edit','create','destory'
    ]);
});
