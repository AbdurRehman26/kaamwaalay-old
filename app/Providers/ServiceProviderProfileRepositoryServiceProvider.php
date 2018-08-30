<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\ServiceProviderProfile;
use App\Data\Repositories\ServiceProviderProfileRepository;

class ServiceProviderProfileRepositoryServiceProvider extends ServiceProvider
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
            'ServiceProviderProfileRepository', function () {
                return new ServiceProviderProfileRepository(new ServiceProviderProfile);
            }
        );
    }
}
