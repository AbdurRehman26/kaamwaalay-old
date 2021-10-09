<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\CityArea;
use App\Data\Repositories\CityAreaRepository;

class CityAreaRepositoryServiceProvider extends ServiceProvider
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
            'CityAreaRepository', function () {
                return new CityAreaRepository(new CityArea);
            }
        );
    }
}
