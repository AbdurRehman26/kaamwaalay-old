<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Job;
use App\Data\Models\JobBid;
use App\Data\Models\ZipCode;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderService;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Data\Models\ServiceProviderProfile;
use App\Jobs\UrgentJobCreate;
use App\Notifications\JobStatusChangeNotification;

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
                $job_bid = JobBid::where('job_id','=',$item->id)->where('is_awarded','=','1')->first();
                if($job_bid){
                    $event = new \StdClass();
                    $event->id = $item->id;
                    $event->body = $item;
                    $event->from = User::find($item->user_id);
                    $event->to = User::find($job_bid->user_id);  
                    if($item->status == Job::COMPLETED){
                        $event->link_text = 'Write Review';
                        $event->title = 'Job Completed';
                        $event->message =  'The job: <strong>'.$item->title.'</strong> has been marked as completed by the <strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong>. Please post a review.'; 
                        $event->type = 'write_review';
                    }else{
                        $event->type = 'job_awarded';
                        $event->title = 'Job Awarded';
                        $event->email_title = 'Job has been awarded';
                        $event->message =  'The Job: <strong>'.$item->title.'</strong> is awarded to you.'; 
                    }
                    $event->to->notify(new JobStatusChangeNotification($event));
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
