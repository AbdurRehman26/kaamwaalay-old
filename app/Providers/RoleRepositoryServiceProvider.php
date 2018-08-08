<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Role;
use App\Data\Repositories\RoleRepository;

class RoleRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('RoleRepository', function () {
            return new RoleRepository(new Role);
        });
    }
}
