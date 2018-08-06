<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\UserProfile;
use App\Providers\Data\Repositories\UserProfileRepository;

class UserProfileRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserProfileRepository', function () {
            return new UserProfileRepository(new UserProfile);
        });
    }
}
