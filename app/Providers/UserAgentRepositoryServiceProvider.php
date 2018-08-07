<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\UserAgent;
use App\Providers\Data\Repositories\UserAgentRepository;

class UserAgentRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserAgentRepository', function () {
            return new UserAgentRepository(new UserAgent);
        });
    }
}
