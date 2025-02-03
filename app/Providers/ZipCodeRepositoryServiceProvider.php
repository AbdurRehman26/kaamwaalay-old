<?php

namespace App\Providers;

use App\Data\Repositories\ZipCodeRepository;
use App\Models\ZipCode;
use Illuminate\Support\ServiceProvider;

class ZipCodeRepositoryServiceProvider extends ServiceProvider
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
            'ZipCodeRepository', function () {
                return new ZipCodeRepository(new ZipCode);
            }
        );
    }
}
