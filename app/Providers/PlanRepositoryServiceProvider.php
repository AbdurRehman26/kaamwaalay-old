<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\Plan;
use App\Providers\Data\Repositories\PlanRepository;

class PlanRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('PlanRepository', function () {
            return new PlanRepository(new Plan);
        });
    }
}
