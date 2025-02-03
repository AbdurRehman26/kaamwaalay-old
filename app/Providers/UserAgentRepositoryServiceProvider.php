<?php

namespace App\Providers;

use App\Data\Repositories\UserAgentRepository;
use App\Models\UserAgent;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'UserAgentRepository', function () {
                return new UserAgentRepository(new UserAgent);
            }
        );
    }
}
