<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\Notification;
use App\Providers\Data\Repositories\NotificationRepository;

class NotificationRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('NotificationRepository', function () {
            return new NotificationRepository(new Notification);
        });
    }
}
