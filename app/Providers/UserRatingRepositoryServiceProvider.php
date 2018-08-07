<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\UserRating;
use App\Providers\Data\Repositories\UserRatingRepository;

class UserRatingRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('UserRatingRepository', function () {
            return new UserRatingRepository(new UserRating);
        });
    }
}
