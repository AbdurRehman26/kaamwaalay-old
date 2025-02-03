<?php

namespace App\Providers;

use App\Data\Repositories\PlanRepository;
use App\Models\Plan;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'PlanRepository', function () {
                return new PlanRepository(new Plan);
            }
        );
    }
}
