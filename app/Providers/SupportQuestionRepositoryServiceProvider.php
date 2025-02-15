<?php

namespace App\Providers;

use App\Services\SupportQuestionRepository;
use App\Models\SupportQuestion;
use Illuminate\Support\ServiceProvider;

class SupportQuestionRepositoryServiceProvider extends ServiceProvider
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
            'SupportQuestionRepository', function () {
                return new SupportQuestionRepository(new SupportQuestion);
            }
        );
    }
}
