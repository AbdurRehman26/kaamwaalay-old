<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Data\Models\Job;
use App\Data\Models\ZipCode;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderService;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Events\UrgentJobCreated;
use App\Data\Models\ServiceProviderProfile;
use App\Data\Models\JobBid;
use App\Notifications\SendUrgentJob;

class UrgentJobCreate implements ShouldQueue
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

      $data = app('JobRepository')->findById($this->data->id);

      $zipCodeModel = new ZipCode;
      $currentZipCode = $zipCodeModel->where('zip_code','=',  $data->zip_code)->first();
      $selectedUsers  =  $this->getUsersByRadius($currentZipCode,50,$data);
      $event = new \StdClass();
      $event->id = $data->id;
      $event->body = $data;
      $event->from = $data->user;
      if($data->job_type == 'urgent'){
        if(!empty($selectedUsers->toArray())){
          foreach ($selectedUsers as $selectedUser) {
            $jobBidData = [
              'job_id'=>$data->id,
              'user_id'=>$selectedUser->id,
              'status'=>JobBid::INVITED,
              'is_invited'=>1
            ];
            app('JobBidRepository')->create($jobBidData);
            // this is already handled in its service provider
                    // $event->to = User::find($selectedUser->id);
                    // $event->message =  '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> has invited you to bid on <strong>'.$data->title.'</strong> job';
                    // $event->type = 'urgent_job';
                    // $event->to->notify(new SendUrgentJob($event));
                        //event(new UrgentJobCreated($data,$selectedUser->id));
          }    
        }else{
         $selectedUsers  =  $this->getUsersByRadius($currentZipCode,100,$data);
         if(!empty($selectedUsers->toArray())){
          foreach ($selectedUsers as $selectedUser) {
           $jobBidData = [
            'job_id'=>$data->id,
            'user_id'=>$selectedUser->id,
            'status'=>JobBid::INVITED,
            'is_invited'=>1
          ];
          app('JobBidRepository')->create($jobBidData); 
          // this is already handled in its service provider
          // $event->to = User::find($selectedUser->id); 
          // $event->message =  '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> has invited you to bid on <strong>'.$data->title.'</strong> job';
          // $event->type = 'urgent_job';
          // $event->to->notify(new SendUrgentJob($event));
        }
      }else{
        $selectedUsers  =  $this->getUsersByRadius($currentZipCode,150,$data);
        if(!empty($selectedUsers->toArray())){
          foreach ($selectedUsers as $selectedUser) {
            $jobBidData = [
              'job_id'=>$data->id,
              'user_id'=>$selectedUser->id,
              'status'=>JobBid::INVITED,
              'is_invited'=>1
            ];
            app('JobBidRepository')->create($jobBidData);
            // this is already handled in its service provider
            // $event->to = User::find($selectedUser->id);
            // $event->message =  '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> has invited you to bid on <strong>'.$data->title.'</strong> job';
            // $event->type = 'urgent_job';
            // $event->to->notify(new SendUrgentJob($event));
          }
        }else{
          $selectedUsers  =  $this->getUsersByRadius($currentZipCode,'',$data);
          foreach ($selectedUsers as $selectedUser) {
            $jobBidData = [
              'job_id'=>$data->id,
              'user_id'=>$selectedUser->id,
              'status'=>JobBid::INVITED,
              'is_invited'=>1
            ];
            app('JobBidRepository')->create($jobBidData);
            // this is already handled in its service provider
            // $event->to = User::find($selectedUser->id); 
            // $event->message =  '<strong>'.$event->from->first_name.' '. $event->from->last_name.'</strong> has invited you to bid on <strong>'.$data->title.'</strong> job';
            // $event->type = 'urgent_job';
            // $event->to->notify(new SendUrgentJob($event));
          }
        }    
      }
    }
  }
}
public function getUsersByRadius($zipcodes,$radius,$data)
{
 $zipCodeModel = new ZipCode;
 $userModel = new User;
 $userTable = $userModel->getTableName();
 $serviceProviderServiceModel = new ServiceProviderService;
 $serviceProviderProfileRequestModel = new ServiceProviderProfileRequest;
 $serviceProviderServiceTable = $serviceProviderServiceModel->getTableName();
 $serviceProviderProfileRequestTable = $serviceProviderProfileRequestModel->getTableName();
 $sql = 'SELECT
 DISTINCT(zip_code), (
 6371 * ACOS (
 COS ( RADIANS(?) )
                  * COS( RADIANS( latitude ) )
                  * COS( RADIANS( longitude ) - RADIANS(?) )
 + SIN ( RADIANS(?) )
                  * SIN( RADIANS( latitude ) )
 )
 ) AS distance
 FROM zip_codes';
 if($radius != ''){
   $sql = $sql.' HAVING distance <= ?';
 }
 $sqlParameter = [];
 $sqlParameter[] = $zipcodes->latitude;
 $sqlParameter[] = $zipcodes->longitude;
 $sqlParameter[] = $zipcodes->latitude;
 if($radius != ''){
   $sqlParameter[] = $radius;
 } 
 $queryResult =  \DB::select($sql, $sqlParameter);
 $selectedZipCodes =  Helper::makeArray($queryResult,'zip_code');
 return $userModel->whereIn('zip_code',$selectedZipCodes)
 ->join(
  $serviceProviderProfileRequestTable, function ($joins) use($data,$serviceProviderProfileRequestTable,$userTable) {
    $joins->on( $serviceProviderProfileRequestTable.'.user_id', '=', $userTable.'.id');
    $joins->where($serviceProviderProfileRequestTable.'.status','=',ServiceProviderProfile::APPROVED);
  })
 ->join(
  $serviceProviderServiceTable, function ($joins) use ($data,$serviceProviderServiceTable,$serviceProviderProfileRequestTable) {
    $joins->on($serviceProviderServiceTable.'.service_provider_profile_request_id', '=', $serviceProviderProfileRequestTable.'.id');
    $joins->where($serviceProviderServiceTable.'.service_id','=',$data->service_id);
  }
)
 ->select($userTable.'.id')->get();
}
}
