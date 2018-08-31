<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\City;
use App\Data\Repositories\CityRepository;

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
