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
use App\Events\UserMessaged;
use App\Data\Models\JobMessage;
Route::get('/clear', function () {
    \Cache::flush();
    dd('cache cleared');
});

Route::get('/clear', function () {
    \Cache::flush();
    dd( App\Data\Models\User::where('role_id' , 2)->first() ,  'cache cleared');
});
Route::get('/password/reset/{token}/{email}', function(){
    return view('front-layout');
})->where('id', '.*')->name('password.reset');
Route::get('/admin/password/set/{token}/{email}', function(){
    return view('admin-layout');
})->where('id', '.*')->name('admin.password.reset');
Route::get('/', function () {
    return view('layout');
});

/*Route::get('/{any}', function(){
    return view('layout');
})->where('any', '.*');*/
Route::post('login/social', 'Api\V1\UserController@socialLogin')->name('social.login');
Route::get('login/social/status', 'Api\V1\UserController@socialLoginCheck')->name('social.login.status');
Route::get('user/activate', 'Auth\LoginController@activateUser')->name('user.activate');

/*Admin Route*/
Route::get('/admin{any}', 'AdminController@index')->where('any', '.*');

/*Front Route*/
Route::prefix('services')->group(function () {

    Route::get('/{services}/{subservice?}', function(App\Data\Models\Service $serviceModel) {
        $subService = $serviceModel->toArray();
        if(!empty($subService)) {
            return view('front-layout', ['service' => $subService]);
        }else {
            return view('front-layout', ['page_not_found' => true]);
        }
        return view('front-layout');
    });
});


Route::get('/{any}', 'FrontController@index')->where('any', '.*');

Route::get('/', 'FrontController@index')->where('any', '.*')->name('front.login');

