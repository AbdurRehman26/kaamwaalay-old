<?php

namespace App\Providers;

use App\Data\Repositories\ServiceRepository;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;

class ServiceRepositoryServiceProvider extends ServiceProvider
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
            'ServiceRepository', function () {
                return new ServiceRepository(new Service);
            }
        );
    }
}
