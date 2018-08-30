<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\ServiceProviderProfileRequestRepository;

class ServiceProviderProfileRequestRepositoryServiceProvider extends ServiceProvider
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
            'ServiceProviderProfileRequestRepository', function () {
                return new ServiceProviderProfileRequestRepository(new ServiceProviderProfileRequest);
            }
        );
    }
}
