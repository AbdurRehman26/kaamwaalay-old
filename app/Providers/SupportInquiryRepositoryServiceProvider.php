<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\SupportInquiry;
use App\Data\Repositories\SupportInquiryRepository;

class SupportInquiryRepositoryServiceProvider extends ServiceProvider
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
            'SupportInquiryRepository', function () {
                return new SupportInquiryRepository(new SupportInquiry);
            }
        );
    }
}
