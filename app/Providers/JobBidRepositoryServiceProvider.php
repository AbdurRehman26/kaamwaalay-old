<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\JobBid;
use App\Data\Repositories\JobBidRepository;

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
        $this->app->bind(
            'JobBidRepository', function () {
                return new JobBidRepository(new JobBid);
            }
        );
    }
}
