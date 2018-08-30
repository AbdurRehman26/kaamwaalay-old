<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Campaign;
use App\Data\Repositories\CampaignRepository;

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
