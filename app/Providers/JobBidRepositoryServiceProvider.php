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
        $job = Job::find($jobBid->job_id);
        $event->id = $job->id;
        $event->body =  $job;
        if($jobBid->is_visit_required == 1 && empty($jobBid->deleted_at) && $jobBid->status != JobBid::VISITALLOWED && $jobBid->status != JobBid::COMPLETED){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = $jobBid->id;
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> requested to visit your address to evaluate work before bidding.';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if($jobBid->status == JobBid::COMPLETED && empty($jobBid->deleted_at)){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->message = 'The awarded <strong>'.$job->title.'</strong> job has been marked as completed by the <strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong>.';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if($jobBid->status == JobBid::VISITALLOWED && empty($jobBid->deleted_at)){
            $event->to =  User::find($jobBid->user_id);
            $event->from = User::find($job->user_id);
            $event->object_id = '';
            $event->message = 'Your visit request for <strong>'.$job->title.'</strong> job has been accepted';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if(!empty($jobBid->deleted_at)){
            $event->to =  User::find($jobBid->user_id);
            $event->from = User::find($job->user_id);
            $event->object_id = '';
            $event->message = 'Your visit request for <strong>'.$job->title.'</strong> job has been declined';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if(!$jobBid->is_awarded && $jobBid->status !=JobBid::CANCELLED && $jobBid->status !=JobBid::COMPLETED ){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->link_text = 'View Bid';
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> modified a bid on <strong>'.$job->title.'</strong> job.';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if($jobBid->status == JobBid::INITIATED && empty($jobBid->deleted_at)){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> initiated a <strong>'.$job->title.'</strong> job.';
            $event->to->notify(new JobBidUpdatedNotification($event));
        }
        if(empty($jobBid->deleted_at) && $jobBid->status == JobBid::ONTHEWAY){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->link_text = 'View Details';
            $event->message = 'Time has been confirmed by a <strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong>';
            $event->to->notify(new JobBidUpdatedNotification($event));
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
        'JobBidRepository', function () {
            return new JobBidRepository(new JobBid);
        }
    );
}
}
