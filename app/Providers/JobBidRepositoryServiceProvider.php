<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\JobBid;
use App\Data\Models\User;
use App\Data\Models\Job;
use App\Data\Repositories\JobBidRepository;
use App\Notifications\JobBidUpdatedNotification;

class JobBidRepositoryServiceProvider extends ServiceProvider
{
/**
* Bootstrap services.
*
* @return void
*/
public function boot()
{

    JobBid::updated(function($jobBid) {

        $event = new \StdClass();
        $event->id = $jobBid->id;
        $event->to = User::find($jobBid->user_id);
        $job = Job::find($jobBid->job_id);
        $event->body =  $job;
        $event->from = User::find($job->user_id);

        $event->to->notify(new JobBidUpdatedNotification($event));
        //$model->notify(new \App\Notifications\SendUrgentJob($event));

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
        'JobBidRepository', function () {
            return new JobBidRepository(new JobBid);
        }
    );
}
}
