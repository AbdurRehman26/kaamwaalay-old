<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\State;
use App\Providers\Data\Repositories\StateRepository;

class StateRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('StateRepository', function () {
            return new StateRepository(new State);
        });
    }
}
