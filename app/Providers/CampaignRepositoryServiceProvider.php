<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\Campaign;
use App\Providers\Data\Repositories\CampaignRepository;

class CampaignRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('CampaignRepository', function () {
            return new CampaignRepository(new Campaign);
        });
    }
}
