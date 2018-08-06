<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\UserServiceReject;
use App\Providers\Data\Repositories\UserServiceRejectRepository;

class UserServiceRejectRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserServiceRejectRepository', function () {
            return new UserServiceRejectRepository(new UserServiceReject);
        });
    }
}
