<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Job;
use App\Data\Models\ZipCode;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderService;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Data\Models\ServiceProviderProfile;
use App\Jobs\UrgentJobCreate;

class JobRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public  function boot() {

        Job::created(function($item) {
             UrgentJobCreate::dispatch($item)->onQueue(config('queue.pre_fix').'urgent-job');
        });

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
