<?php

namespace App\Providers;

use App\Services\JobMessageRepository;
use App\Models\JobMessage;
use Illuminate\Support\ServiceProvider;

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
