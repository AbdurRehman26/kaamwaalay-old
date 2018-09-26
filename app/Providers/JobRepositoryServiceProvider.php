<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Data\Models\Job;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Events\UrgentJobCreated;
use App\Data\Models\ServiceProviderProfile;

class JobRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
public  function boot() {

        Job::created(function($item) {
             $data = app('JobRepository')->findById($item->id);
             $zipCodeModel = app('ZipCodeRepository')->model;
             $userModel = app('UserRepository')->model;
             $userTable = $userModel->getTableName();
             $serviceProviderServiceTable = app('ServiceProviderServiceRepository')->model->getTableName();
             $serviceProviderProfileRequestTable = app('ServiceProviderProfileRequestRepository')->model->getTableName();
             $currentZipCode = $zipCodeModel->where('zip_code','=',  $data->zip_code)->first();
             $selectedUsers  =  $this->getUsersByRadius($currentZipCode,50,$data);
             if($data->job_type == 'urgent'){
                if(!empty($selectedUsers)){
                    foreach ($selectedUsers as $selectedUser) {
                        event(new UrgentJobCreated($data,$selectedUser->id));
                    }    
                }else{
                 $selectedUsers  =  $this->getUsersByRadius($currentZipCode,100,$data);
                 if(!empty($selectedUsers)){
                    foreach ($selectedUsers as $selectedUser) {
                        event(new UrgentJobCreated($data,$selectedUser->id));
                    }
                }else{
                    $selectedUsers  =  $this->getUsersByRadius($currentZipCode,150,$data);
                    if(!empty($selectedUsers)){
                        foreach ($selectedUsers as $selectedUser) {
                            event(new UrgentJobCreated($data,$selectedUser->id));
                        }
                    }else{
                        $selectedUsers  =  $this->getUsersByRadius($currentZipCode,'',$data);
                        foreach ($selectedUsers as $selectedUser) {
                            event(new UrgentJobCreated($data,$selectedUser->id));
                        }
                    }    
                }
            }
        }
    });

}
public function getUsersByRadius($zipcodes,$radius,$data)
    {
           $zipCodeModel = app('ZipCodeRepository')->model;
           $userModel = app('UserRepository')->model;
           $userTable = $userModel->getTableName();
           $serviceProviderServiceTable = app('ServiceProviderServiceRepository')->model->getTableName();
           $serviceProviderProfileRequestTable = app('ServiceProviderProfileRequestRepository')->model->getTableName();
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
