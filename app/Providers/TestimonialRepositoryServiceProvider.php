<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Testimonial;
use App\Data\Repositories\TestimonialRepository;

class TestimonialRepositoryServiceProvider extends ServiceProvider
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
            'TestimonialRepository', function () {
                return new TestimonialRepository(new Testimonial);
            }
        );
    }
}
