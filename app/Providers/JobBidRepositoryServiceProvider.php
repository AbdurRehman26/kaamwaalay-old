<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\JobBid;
use App\Providers\Data\Repositories\JobBidRepository;

class JobBidRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('JobBidRepository', function () {
            return new JobBidRepository(new JobBid);
        });
    }
}
