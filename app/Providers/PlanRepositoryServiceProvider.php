<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Plan;
use App\Data\Repositories\PlanRepository;

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
