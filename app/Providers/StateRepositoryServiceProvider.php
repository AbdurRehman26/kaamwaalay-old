<?php

namespace App\Providers;

use App\Data\Repositories\StateRepository;
use App\Models\State;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'StateRepository', function () {
                return new StateRepository(new State);
            }
        );
    }
}
