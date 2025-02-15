<?php

namespace App\Providers;

use App\Services\CityRepository;
use App\Models\City;
use Illuminate\Support\ServiceProvider;

class CityRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'CityRepository', function () {
                return new CityRepository(new City);
            }
        );
    }
}
