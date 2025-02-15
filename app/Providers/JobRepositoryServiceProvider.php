<?php

namespace App\Providers;

use App\Services\JobRepository;
use App\Jobs\UrgentJobCreate;
use App\Models\Job;
use App\Models\JobBid;
use App\Models\User;
use App\Notifications\JobStatusChangeNotification;
use Illuminate\Support\ServiceProvider;

class JobRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public  function boot() {

        Job::created(function($item) {
         UrgentJobCreate::dispatch($item)->onQueue(config('queue.pre_fix').'urgent-job');
     }); 
        Job::updated(function($item) {

            if (!\App::runningInConsole()) {
              if($item->status == Job::COMPLETED || $item->status == Job::AWARDED){  
                if (!$item->is_archived) {
                $job_bid = JobBid::where('job_id','=',$item->id)->where('is_awarded','=','1')->first();
                if($job_bid){
                    $event = new \StdClass();
                    $event->id = $item->id;
                    $event->body = $item;
                    $event->from = User::find($item->user_id);
                    $event->to = User::find($job_bid->user_id);  
                    $event->email_title = 'Job Marked Completed';
                    if($item->status == Job::COMPLETED){
                        $event->link_text = 'Write Review';
                        $event->title = 'Job Completed';
                        $event->message =  'The job: <strong>'.$item->title.'</strong> has been marked as completed by the <strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong>. Please post a review.'; 
                        $event->type = 'write_review';
                    }else{
                        $event->type = 'job_awarded';
                        $event->title = 'Job Awarded';
                        $event->email_title = 'Job Awarded';
                        $event->message =  'The Job: <strong>'.$item->title.'</strong> is awarded to you.'; 
                    }
                    $event->to->notify(new JobStatusChangeNotification($event));
                }
                }
            }

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
                'JobRepository', function () {
                    return new JobRepository(new Job);
                }
            );
        }
    }
