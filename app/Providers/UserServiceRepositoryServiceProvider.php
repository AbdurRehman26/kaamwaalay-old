<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\UserService;
use App\Providers\Data\Repositories\UserServiceRepository;

class UserServiceRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserServiceRepository', function () {
            return new UserServiceRepository(new UserService);
        });
    }
}
