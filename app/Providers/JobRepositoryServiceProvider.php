<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\Job;
use App\Providers\Data\Repositories\JobRepository;

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
        $this->app->bind('JobRepository', function () {
            return new JobRepository(new Job);
        });
    }
}
