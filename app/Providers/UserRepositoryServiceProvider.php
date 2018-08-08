<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\User;
use App\Data\Repositories\UserRepository;

class UserRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserRepository', function () {
            return new UserRepository(new User);
        });
    }
}
