<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SEOServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(
        //     'front-layout', 'App\Http\ViewComposers\ServiceComposer'
        // );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
