<?php

namespace App\Providers;

use App\Services\SupportInquiryRepository;
use App\Models\SupportInquiry;
use Illuminate\Support\ServiceProvider;

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
