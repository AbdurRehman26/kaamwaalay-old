<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\UserRating;
use App\Data\Models\User;
use App\Data\Repositories\UserRatingRepository;
use App\Data\Models\Job;
use App\Notifications\UserRatingCreatedNotification;

class UserRatingRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UserRating::created(function($userRating) {

            $event = new \StdClass();
            $job = Job::find($userRating->job_id);
            $event->id = $job->id;
            $event->body =  $job; 
            if($userRating->status == UserRating::APPROVED){
               $event->from = User::find($userRating->rated_by);
               $event->to = User::find($userRating->user_id);   
               $event->message = $event->from->first_name.' '.$event->from->last_name.' posted a review & rating on '.$job->title.'. Please Review'; 
               $event->to->notify(new UserRatingCreatedNotification($event));
            }     
       });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'UserRatingRepository', function () {
                return new UserRatingRepository(new UserRating);
            }
        );
    }
}
