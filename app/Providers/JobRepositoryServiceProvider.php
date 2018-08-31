<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Job;
use App\Data\Repositories\JobRepository;

class JobRepositoryServiceProvider extends ServiceProvider
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
            'JobRepository', function () {
                return new JobRepository(new Job);
            }
        );
    }
}
