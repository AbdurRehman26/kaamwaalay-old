<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\ServiceProviderProfile;
use App\Providers\Data\Repositories\ServiceProviderProfileRepository;

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
        $this->app->bind('ServiceProviderProfileRepository', function () {
            return new ServiceProviderProfileRepository(new ServiceProviderProfile);
        });
    }
}
