<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Notifications\JobBidCreatedNotification;
use App\Data\Models\User;
use App\Data\Models\Job;
use App\Data\Models\JobBid;

class JobBidCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        $event = new \StdClass();
        $job = Job::find($this->data['job_id']);
        $event->id = $job->id;
        $event->body =  $job;

        if(!empty($this->data['is_visit_required']) && $this->data['is_visit_required'] == 1 && empty($this->data['deleted_at']) && $this->data['status'] != JobBid::VISITALLOWED && $this->data['status'] != JobBid::COMPLETED){
            $event->to = User::find($job->user_id);
            $event->from = User::find($this->data['user_id']);
            $event->type = 'visit_required';
            $event->email_title = 'Requested For A Visit'; 
            $event->title = 'Visit Requested'; 
            $event->object_id = $this->data['id'];
            $event->message = '<strong>'.$event->from->first_name.' '.$event->from->last_name.'</strong> requested to visit your address to evaluate work before bidding.';
        }else if(!empty($this->data['is_invited'])){
            if($this->data['is_invited'] == 1){
               $event->from = User::find($job->user_id);
               $event->to = User::find($this->data['user_id']);
               $event->email_title = 'Job Invitation';
               $event->title = 'Job Invitation';
               $event->type = 'invited';  
               $event->message = '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> has invited you to bid on the job: <strong>'.$job->title.'</strong>.'; 
           }
       }else{ 
         $event->to = User::find($job->user_id);
         $event->from = User::find($this->data['user_id']);
         $event->type = 'bid_created';
         $event->title = 'Bid Posted';
         $event->message =  '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> posted a bid on the job: <strong>'.$job->title.'</strong>.'; 
        }
        

        $event->to->notify(new JobBidCreatedNotification($event));
    }
}
