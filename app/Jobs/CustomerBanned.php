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
            // this code will be removed after reviewed
            // $currentUserJobs = app('JobRepository')->findByCriteriaAll(['user_id' => $data['id']])->toArray();
            // foreach ($currentUserJobs as $column => $value) {
            //     $jobCancelled = app('JobRepository')->update(['id' => $value['id'], 'status' => 'cancelled']);
            //     $jobBids = app('JobBidRepository')->findByCriteriaAll('job_id', '=', $jobCancelled->id)->pluck('id')->toArray();
            //     foreach ($jobBids as $key => $value2) {
            //         $tempData = [];
            //         $tempData['id'] = $value2;
            //         $tempData['job_id'] = $jobCancelled->id;
            //         $tempData['status'] = "cancelled";
            //         $tempData['updateJob'] = false;
            //         $response = app('JobBidRepository')->update($tempData);
            //     }
            // }
            $jobs = Job::where('user_id','=',$this->data->id)->whereNotIn('status',[Job::COMPLETED,Job::CANCELLED])->get();
            foreach ($jobs as $job) {
                $jobBids = JobBid::where('job_id', '=', $job->id)->whereNotIn('status',[JobBid::COMPLETED,JobBid::CANCELLED])->get();
                $jobCancelled = app('JobRepository')->update(['id' => $job->id, 'status' => Job::CANCELLED]);
                foreach ($jobBids as $jobBid) {

                    $tempData = [];
                    $tempData['id'] = $jobBid->id;
                    $tempData['job_id'] = $job->id;
                    $tempData['status'] = JobBid::CANCELLED;
                    $tempData['updateJob'] = false;
                    $response = app('JobBidRepository')->update($tempData);

                    $event = new \StdClass();
                    $event->id = $job->id;
                    $event->to = User::find($jobBid->user_id);
                    if($jobBid->is_awarded == 1){
                      $event->message =  'We apologize you may not perform this <strong>'.$job->title.'</strong> job as the user has been banned.';  
                    }else{
                      $event->message =  'We apologize you may not place a bid on this <strong>'.$job->title.'</strong> job as the user has been banned.';
                    }
                    if($event->to){
                      $event->to->notify(new CustomerBannedNotification($event));
                    }
                }

            }

    }
}
