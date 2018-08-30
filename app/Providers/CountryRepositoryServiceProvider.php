<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Country;
use App\Data\Repositories\CountryRepository;

class CountryRepositoryServiceProvider extends ServiceProvider
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
            'CountryRepository', function () {
                return new CountryRepository(new Country);
            }
        );
    }
}
