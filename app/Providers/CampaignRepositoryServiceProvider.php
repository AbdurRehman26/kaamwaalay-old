<?php

namespace App\Providers;

use App\Data\Repositories\CampaignRepository;
use App\Models\Campaign;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(
            'CampaignRepository', function () {
                return new CampaignRepository(new Campaign);
            }
        );
    }
}
