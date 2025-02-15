<?php

namespace App\Providers;

use App\Services\UserRepository;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'UserRepository', function () {
                return new UserRepository(new User);
            }
        );
    }
}
