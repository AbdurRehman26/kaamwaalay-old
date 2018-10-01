<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Data\Models\Job;
use App\Data\Models\JobBid;
use App\Data\Models\ZipCode;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderService;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Events\UrgentJobCreated;
use App\Data\Models\ServiceProviderProfile;
use App\Notifications\CustomerBannedNotification;

class CustomerBanned implements ShouldQueue
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
            $jobs = Job::where('user_id','=',$this->data->id)->get();
            foreach ($jobs as $job) {
                $jobBids = JobBid::where('job_id','=',$job->id)->where('status','!=',JobBid::COMPLETED)->get();
                foreach ($jobBids as $jobBid) {
                    $event = new \StdClass();
                    $event->to = User::find($jobBid->user_id);
                    if($jobBid->is_awarded == 1){
                      $event->message =  'We apologize you may not perform this '.$job->title.' as the user has been banned.';  
                    }else{
                      $event->message =  'We apologize you may not place a bid on this '.$job->title.' as the user has been banned.';
                    }
                    if($event->to){
                      $event->to->notify(new CustomerBannedNotification($event));
                    }
                }

            }

    }
}
