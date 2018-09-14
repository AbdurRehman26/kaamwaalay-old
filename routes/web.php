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
Route::get('user/activate', 'Auth\LoginController@activateUser')->name('user.activate');

/*Admin Route*/
Route::get('/admin{any}', 'AdminController@index')->where('any', '.*');
Route::get('/hello', function() {
    dd(phpinfo());
});


/*Front Route*/
Route::get('services/{any}', function(App\Data\Models\Service $service) {
    dd(phpinfo());
	$currentRoute = Route::current();
    $params = $currentRoute->parameters();
    if(!empty($params['any'])) {
        $any = $params['any'];
        if (strpos($any, '/') == false) {
            $service = $service->where('url_suffix', '=', $any)->where('status', '=', 1)->get()->toArray();

            if(empty($service)) {
                return view('front-layout', ['page_not_found' => true]);
            }
        }
		return view('front-layout', ['service' => $service[0]]);
    }
    return view('front-layout');
})->where('any', '.*');

Route::get('/{any}', 'FrontController@index')->where('any', '.*');

Route::get('/', 'FrontController@index')->where('any', '.*')->name('front.login');

