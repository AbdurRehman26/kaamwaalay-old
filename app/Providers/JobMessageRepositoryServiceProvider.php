<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\JobMessage;
use App\Providers\Data\Repositories\JobMessageRepository;

class JobMessageRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('JobMessageRepository', function () {
            return new JobMessageRepository(new JobMessage);
        });
    }
}
