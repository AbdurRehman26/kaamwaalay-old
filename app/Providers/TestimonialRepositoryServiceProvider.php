<?php

namespace App\Providers;

use App\Data\Repositories\TestimonialRepository;
use App\Models\Testimonial;
use Illuminate\Support\ServiceProvider;

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
