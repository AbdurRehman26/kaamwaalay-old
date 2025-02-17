<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::bind('services', function ($service, $route) {
            $subservice = $route->parameter('subservice');
            if(is_numeric($subservice)) {
                return Service::where('url_suffix', '=', $service)->where('status', '=', 1)->first();
            }
            if($subservice) {
                return Service::where('url_suffix', '=', $subservice)->where('status', '=', 1)->first();    
            }
            return Service::where('url_suffix', '=', $service)->where('status', '=', 1)->first();
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapAuthApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
      /**
     * Define the "passport" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapPasswordRoutes()
    {
        Route::prefix('password')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
      /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAuthApiRoutes()
    {
        Route::prefix('api')
             ->middleware(['api', 'auth:api'])
             ->namespace($this->namespace)
             ->group(base_path('routes/auth.php'));
    }
}
