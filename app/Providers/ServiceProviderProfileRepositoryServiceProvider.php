<?php

namespace App\Providers;

use App\Data\Repositories\ServiceProviderProfileRepository;
use App\Models\ServiceProviderProfile;
use Illuminate\Support\ServiceProvider;

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
