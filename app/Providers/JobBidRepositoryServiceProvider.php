<?php

namespace App\Providers;

use App\Data\Repositories\JobBidRepository;
use App\Models\Job;
use App\Models\JobBid;
use App\Models\User;
use App\Notifications\JobBidUpdatedNotification;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

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
        $time = Carbon::parse($jobBid->suggested_time)->format('h:i A');
        $date = Carbon::parse($jobBid->suggested_date)->toFormattedDateString();
        if($jobBid->is_visit_required == 1 && empty($jobBid->deleted_at) && $jobBid->status == JobBid::SUGGESTED) {
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = $jobBid->id;
            $event->type = 'suggested_time';
            $event->email_title = 'Suggested Date and Time For A Visit';
            $event->link_text = 'View Job';
            $event->title = 'Suggested date and time';
            $event->message = '<strong>'.$event->to->first_name.' '.$event->to->last_name.'</strong> suggested Date, Time: '.$date.', '.$time.' for the job: <strong>'.$job->title.'</strong>.';
            $event->from->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if($jobBid->is_visit_required == 1 && empty($jobBid->deleted_at) && $jobBid->status != JobBid::VISITALLOWED && $jobBid->status != JobBid::COMPLETED && $jobBid->status != JobBid::ONTHEWAY && $jobBid->status !=JobBid::CANCELLED) {
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = $jobBid->id;
            $event->type = 'visit_required';
            $event->email_title = 'Requested For A Visit';
            $event->title = 'Visit Requested';
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> requested to visit your address to evaluate work before bidding on the job: <strong>'.$job->title.'</strong>.';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }else if(!$jobBid->is_awarded && !$jobBid->is_archived && $jobBid->status !=JobBid::CANCELLED && $jobBid->status !=JobBid::COMPLETED && empty($jobBid->deleted_at) && $jobBid->status != JobBid::VISITALLOWED && $jobBid->status != JobBid::ONTHEWAY ){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->link_text = 'View Bid';
            $event->type = 'bid_modified';
            $event->email_title = 'Bid Modified';
            $event->title = 'Modified A Bid';
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> modified a bid on the job: <strong>'.$job->title.'</strong>.';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if($jobBid->status == JobBid::COMPLETED && empty($jobBid->deleted_at)){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->type = 'job_marked_completed';
            $event->email_title = 'Job Mark Done';
            $event->title = 'Job Mark Done';
            $event->link_text = 'Write a Review';
            $event->message = 'The awarded job: <strong>'.$job->title.'</strong> has been marked as done by the <strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong>. Please post a review.';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if($jobBid->status == JobBid::VISITALLOWED && empty($jobBid->deleted_at)){
            if($jobBid->user_id == request()->user()->id) {
                $event->to =  User::find($job->user_id);
                $event->from = User::find($jobBid->user_id);
                $event->object_id = '';
                $event->email_title = 'Visit Request Accepted';
                $event->title = 'Visit Request Accepted';
                $event->type = 'visit_approved_sp';
                $event->message = 'Your suggested time ('.$date.', '.$time.') has been accepted for the job: <strong>'.$job->title;
                $event->to->notify(new JobBidUpdatedNotification($event));
                return;
            }else {
                $event->to =  User::find($jobBid->user_id);
                $event->from = User::find($job->user_id);
                $event->object_id = '';
                $event->email_title = 'Visit Request Accepted';
                $event->title = 'Visit Request Accepted';
                $event->type = 'visit_approved';
                $event->message = 'Your visit request for the job: <strong>'.$job->title.'</strong> has been accepted';
                $event->to->notify(new JobBidUpdatedNotification($event));
                return;
            }
        }
        if(!empty($jobBid->deleted_at) && $jobBid->user_id == request()->user()->id){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->email_title = 'Visit Request Rejected';
            $event->title = 'Visit Request Rejected';
            $event->type = 'visit_declined_sp';
            $event->message = 'Your suggested time for the job: <strong>'.$job->title.'</strong> has been declined';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if(!empty($jobBid->deleted_at) && $jobBid->user_id != request()->user()->id){
            $event->to =  User::find($jobBid->user_id);
            $event->from = User::find($job->user_id);
            $event->object_id = '';
            $event->email_title = 'Visit Request Rejected';
            $event->title = 'Visit Request Rejected';
            $event->type = 'visit_declined';
            $event->message = 'Your visit request for the job: <strong>'.$job->title.'</strong> has been declined';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if($jobBid->status == JobBid::INITIATED && empty($jobBid->deleted_at)){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->email_title = 'Job Initiated';
            $event->title = 'Job Initiated';
            $event->type = 'job_initiated';
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> initiated a job: <strong>'.$job->title.'</strong>.';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
        }
        if(empty($jobBid->deleted_at) && $jobBid->status == JobBid::ONTHEWAY){
            $event->to =  User::find($job->user_id);
            $event->from = User::find($jobBid->user_id);
            $event->object_id = '';
            $event->link_text = 'View Details';
            $event->type = 'go_to_visit';
            $event->email_title = 'Time Confirmation';
            $event->title = 'Time Confirmation';
            $event->message = 'Time has been confirmed by a <strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> on the job: <strong>'.$job->title.'</strong>';
            $event->to->notify(new JobBidUpdatedNotification($event));
            return;
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
