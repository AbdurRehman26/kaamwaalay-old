<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\SupportQuestion;
use App\Data\Repositories\SupportQuestionRepository;

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
