<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\ServiceProviderService;
use App\Data\Repositories\ServiceProviderServiceRepository;

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
