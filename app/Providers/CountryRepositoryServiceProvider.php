<?php

namespace App\Providers;

use App\Services\CountryRepository;
use App\Models\Country;
use Illuminate\Support\ServiceProvider;

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
