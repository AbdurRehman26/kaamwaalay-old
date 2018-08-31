<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\JobMessage;
use App\Data\Repositories\JobMessageRepository;

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
        $this->app->bind(
            'JobMessageRepository', function () {
                return new JobMessageRepository(new JobMessage);
            }
        );
    }
}
