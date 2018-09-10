<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Payment;
use App\Data\Repositories\PaymentRepository;

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
