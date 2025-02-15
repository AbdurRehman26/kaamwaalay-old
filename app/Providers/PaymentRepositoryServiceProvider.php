<?php

namespace App\Providers;

use App\Services\PaymentRepository;
use App\Models\Payment;
use Illuminate\Support\ServiceProvider;

class PaymentRepositoryServiceProvider extends ServiceProvider
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
            'PaymentRepository', function () {
                return new PaymentRepository(new Payment);
            }
        );
    }
}
