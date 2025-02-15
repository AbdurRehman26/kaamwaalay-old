<?php

namespace App\Providers;

use App\Services\ServiceProviderServiceRepository;
use App\Models\ServiceProviderService;
use Illuminate\Support\ServiceProvider;

class ServiceProviderServiceRepositoryServiceProvider extends ServiceProvider
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
            'ServiceProviderServiceRepository', function () {
                return new ServiceProviderServiceRepository(new ServiceProviderService);
            }
        );
    }
}
