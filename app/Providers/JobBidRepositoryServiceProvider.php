<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\JobBid;
use App\Data\Models\User;
use App\Data\Models\Job;
use App\Data\Repositories\JobBidRepository;
use App\Notifications\JobBidUpdatedNotification;
use App\Notifications\JobBidCreatedNotification;

class JobBidRepositoryServiceProvider extends ServiceProvider
{
/**
* Bootstrap services.
*
* @return void
*/
public function boot()
{

       JobBid::created(function($jobBid) {

        $event = new \StdClass();
        $job = Job::find($jobBid->job_id);
        $event->id = $job->id;
        $event->body =  $job; 
        if($jobBid->is_invited == 1){
         $event->from = User::find($job->user_id);
         $event->to = User::find($jobBid->user_id);   
         $event->message = $event->from->first_name.' '. $event->from->last_name.' has invited you to bid on their job.'; 
        }else{ 
         $event->to = User::find($job->user_id);
         $event->from = User::find($jobBid->user_id);   
         $event->message =  $event->from->first_name.' '. $event->from->last_name.' posted a bid on '.$job->title; 
        }
        $event->to->notify(new JobBidCreatedNotification($event));
    });
    JobBid::updated(function($jobBid) {

        $event = new \StdClass();
        $job = Job::find($jobBid->job_id);
        $event->id = $job->id;
        $event->body =  $job;
        $event->to =  User::find($job->user_id);
        $event->from = User::find($jobBid->user_id);
        if($jobBid->is_visit_required == 1){
            $event->message = $event->from->first_name.' '.$event->from->last_name.' requested to visit your address to evaluate work before bidding.';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if($jobBid->status == JobBid::COMPLETED){
            $event->message = 'Your '.$job->title.' job is completed. Please post a review.';
        }else{
            $event->message = $event->from->first_name.' '.$event->from->last_name.' modified a bid on '.$job->title;
        }
        $event->to->notify(new JobBidUpdatedNotification($event));
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
