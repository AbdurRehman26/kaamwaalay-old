<?php

namespace App\Providers;

use App\Data\Repositories\RoleRepository;
use App\Models\Role;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'RoleRepository', function () {
                return new RoleRepository(new Role);
            }
        );
    }
}
