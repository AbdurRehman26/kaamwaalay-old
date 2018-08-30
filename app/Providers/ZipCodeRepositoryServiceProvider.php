<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\ZipCode;
use App\Data\Repositories\ZipCodeRepository;

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
