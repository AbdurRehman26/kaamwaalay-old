<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\User;
use App\Data\Models\Role;
use DB;
use Carbon\Carbon;
use Storage;
use App\Helper\Helper;

class UserRepository extends AbstractRepository implements RepositoryContract
{
/**
* These will hold the instance of User Class.
*
* @var    object
* @access public
**/
public $model;

/**
* This is the prefix of the cache key to which the
* App\Data\Repositories data will be stored
* App\Data\Repositories Auto incremented Id will be append to it
*
* Example: User-1
*
* @var    string
* @access protected
**/

protected $_cacheKey = 'user';
protected $_cacheTotalKey = 'total-user';

public function __construct(User $model)
{
    $this->model = $model;
    $this->builder = $model;
    $this->roleRepo = app('RoleRepository');

}


public function findById($id, $refresh = false, $details = false, $encode = true)
{
    $data = parent::findById($id, $refresh, $details, $encode);

    if($data) {
        $data->profile_image = str_replace('(NULL)', '', $data->profile_image);
        $data->profileImage = $data->profile_image;
        
        if($data->profile_image && substr($data->profile_image, 0, 8) != "https://"){
            $data->profileImage = Storage::url(config('uploads.user.folder').'/'.$data->profile_image);
        }

        $data->role = app('RoleRepository')->findById($data->role_id);

        if (!empty($details['profile_data'])) {

            if($data->role_id == Role::SERVICE_PROVIDER) {
// Todo
                $data->business_details = (Object) app('ServiceProviderProfileRepository')->findByAttribute('user_id', $id, false, true);                
                if (!empty($details['provider_request_data'])) {
                    $serviceDetailsCriteria = ['user_id' => $id];
                    $data->service_details = app('ServiceProviderProfileRequestRepository')->getUserServices($serviceDetailsCriteria);                
                }

            }   
        }

        if (!empty($details['user_rating'])) {
            $criteria = ['user_id' => $id];
            $data->average_rating = app('UserRatingRepository')->getAvgRatingCriteria($criteria);

            $data->total_feedback_count = app('UserRatingRepository')->getTotalFeedbackCriteria($criteria);

            $criteria['status'] = 'completed';
            $data->total_finished_jobs = app('JobBidRepository')->getCountByCriteria($criteria);
        }

        if($data->role_id == Role::CUSTOMER) {
// Todo
            $avgCriteria = ['user_id' => $data->id,'status'=>'approved'];
            $avgRating = app('UserRatingRepository')->getAvgRatingCriteria($avgCriteria, false);
            $data->avg_rating = $avgRating;

            $totalInitiatedJobsCriteria = ['user_id' => $data->id,'status'=>'initiated'];
            $totalInitiatedJobs = app('JobRepository')->getTotalCountByCriteria($totalInitiatedJobsCriteria);
            $data->total_initiated_jobs = $totalInitiatedJobs;

            $totalFinsheddJobsCriteria = ['user_id' => $data->id,'status'=>'completed'];
            $totalFinshedJobs = app('JobRepository')->getTotalCountByCriteria($totalFinsheddJobsCriteria);
            $data->total_finshed_jobs = $totalFinshedJobs;

            $totalUrgentJobsCreatedCriteria = ['user_id' => $data->id,'job_type'=>'urgent'];
            $totalUrgentJobsCreated = app('JobRepository')->getTotalCountByCriteria($totalUrgentJobsCreatedCriteria);
            $data->total_urgent_jobs_created = $totalUrgentJobsCreated;

            $totalUrgentJobsCompletedCriteria = ['user_id' => $data->id,'job_type'=>'urgent','status'=>'completed'];
            $totalUrgentJobsCompleted = app('JobRepository')->getTotalCountByCriteria($totalUrgentJobsCompletedCriteria);
            $data->total_urgent_jobs_completed = $totalUrgentJobsCompleted;

            $totalInBiddingCriteria = ['user_id' => $data->id, 'status'=>'in_bidding'];
            $data->total_inbidding_jobs = app('JobRepository')->getTotalCountByCriteria($totalInBiddingCriteria);;


        }
        $country = app('CountryRepository')->findById($data->country_id);             
        $data->country = !empty($country->name) ? $country->name : '';
        $City = app('CityRepository')->findById($data->city_id);                
        $data->city = !empty($City->name)?$City->name:'';
        $state = app('StateRepository')->findById($data->state_id);                
        $data->state = !empty($state->name)?$state->name:'';

        $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');

        if (!empty($details['role'])) {
            $data->role = $this->roleRepo->findById($data->role_id);
        }

    }

    return $data;
}



public function findByAll($pagination = false,$perPage = 10, $data = [])
{       

    $this->builder = $this->model->orderBy('users.created_at', 'desc');

    if (!empty($data['keyword'])) {

        $this->builder = $this->builder->where(
            function ($query) use ($data) {
                $query->where(DB::raw('concat(first_name," ",last_name)'), 'LIKE', "%{$data['keyword']}%");
            }
        );
    }

    if(!empty($data['filter_by_status'])) {
        $this->builder = $this->builder->where('status', '=', $data['filter_by_status']);
    }

    if(!empty($data['filter_by_role'])) {
        $this->builder = $this->builder->where('role_id', '=', $data['filter_by_role']);
    }
    if(!empty($data['filter_by_roles'])) {
        $this->builder = $this->builder->whereIn('role_id', $data['filter_by_roles']);
    }
    if(!empty($data['filter_by_service'])) {

        $this->builder->leftJoin(
            'jobs', function ($join) use ($data) {
                $join->on('jobs.user_id', '=', 'users.id');
            }
        )->where('jobs.service_id', $data['filter_by_service'])
        ->select(['users.id'])
        ->groupBy('users.id');
    }


    return parent::findByAll($pagination, $perPage, $data);

}

public function update(array $data = [])
{
    $input = $data['user_details'];

    $input['id'] = $data['id'];

    if ($user = parent::update($input)) {

        if($user->role_id == Role::SERVICE_PROVIDER) {
            if(!empty($data['business_details'])) {
                $business_details = $data['business_details']; 
                $business_details['user_id'] = $user->id;
                if($business = app('ServiceProviderProfileRepository')->findByAttribute('user_id', $user->id)) {
                    $business_details['id'] = $business->id;
                    $user->business_details = app('ServiceProviderProfileRepository')->update($business_details);
                }else{
                    $user->business_details = app('ServiceProviderProfileRepository')->create($business_details);
                }
            }

// Here we will check if service details exist. they will exist in case of service provider

            if(!empty($data['service_details'])) {

                $criteria = ['user_id' => $input['id'] , 'status' => 'pending'];

                $profileRequest = app('ServiceProviderProfileRequestRepository')->findByCriteria($criteria);

// Checking if a profile request is already in a pending state or not.
// if yes no new request will be generate 

                if(!$profileRequest) {

                    self::updateServices($data, $user);

                }

            }

            $details = ['profile_data' => true , 'provider_request_data' => true];
            $user = self::findById($user->id, true, $details);
        }


        return $user;
    }


    return false;
}


public function updateServices($data, $user)
{
    $servicesRepository = app('ServiceRepository');

    $serviceProfileRequestRepository = app('ServiceProviderProfileRequestRepository');

    foreach ($data['service_details'] as $key => $service) {

        // Service id is definitely required in order to update a profile request

        if(empty($service['service_id']) ||  (!empty($service['status']) && $service['status'] == 'approved')) {
            continue;
        }

        \Log::info('1');

        if(!empty($service['service_provider_profile_request_id']) && (!empty($service['status']) && $service['status'] == 'rejected')) {
            unset($service['status']);

            $existingServiceIds[$service['service_provider_profile_request_id']][] = $service['service_id'];

            $service['deleted_at'] = null;
            $existingServices[] = $service;
            \Log::info('2');

        }else{
            unset($service['status'] , $service['service_provider_profile_request_id']);
            \Log::info('3');


            $serviceExists = $serviceProfileRequestRepository->model
            ->join('service_provider_services', 'service_provider_services.service_provider_profile_request_id', 'service_provider_profile_requests.id')
            ->whereNull('service_provider_services.deleted_at')
            ->where('service_provider_profile_requests.status' , '!=' , 'rejected')
            ->where('service_provider_services.service_id' , $service['service_id'])
            ->where('service_provider_profile_requests.user_id', $user->id)
            ->first();
            if(empty($serviceExists)){      
                $newServices[] = $service;
            }
        }
    }
    \Log::info('4');

    if(!empty($newServices)) {

        \Log::info('5');

        $toBeAddedServices = [];

        $serviceProfileRequest = app('ServiceProviderProfileRequestRepository')->create(['user_id' => $user->id]);
        foreach ($newServices as $key => $newService) {

            $childServices = $servicesRepository->getAllServicesByCategory($newService['service_id']);

            if(!empty($childServices)){
                \Log::info('6');

                $childServiceIds = Helper::makeArray($childServices['data'], 'id');

                $newServiceIds = Helper::makeArray($newServices, 'service_id');

                $similarIds = array_intersect($childServiceIds, $newServiceIds);

                foreach ($similarIds as $key => $similarId) {
                    unset($childServiceIds[$key]);
                }

                $criteria = ['user_id' => $user->id];
                
                $existingSavedServices = $serviceProfileRequestRepository->getSubServices($criteria, true);
                $similarIds =  array_intersect($childServiceIds , $existingSavedServices);

                foreach ($similarIds as $key => $similarId) {
                    unset($childServiceIds[$key]);
                }

                foreach ($childServiceIds as $key => $childServiceId) {
                    $toBeAddedServices[] = [
                        'service_id' => $childServiceId,
                        'service_provider_profile_request_id' => $serviceProfileRequest->id
                    ];                     
                }

            }

            \Log::info('7');
            $toBeAddedServices[] = [
                'service_id' => $newService['service_id'],
                'service_provider_profile_request_id' => $serviceProfileRequest->id
            ]; 
        }
        \Log::info('8');
        app('ServiceProviderServiceRepository')->model->insert($toBeAddedServices);
    }
    \Log::info('9');

    if(!empty($existingServiceIds)) {
        foreach ($existingServiceIds as $key => $existingServiceId) {
            app('ServiceProviderServiceRepository')->model
            ->where('service_provider_profile_request_id', $key)
            ->whereNotIn('id', $existingServiceId)->delete();
        }

        app('ServiceProviderServiceRepository')->model->insertOnDuplicateKey($existingServices);

        \Log::info('9');
    }

}

public function getTotalCountByCriteria($crtieria = [], $startDate = null, $endDate = null)
{

    $model = $this->model;

    if($crtieria) {
        $model = $model->where($crtieria);
    }

    if($startDate && $endDate) {
        $model = $model->whereBetween('created_at', [$startDate, $endDate]);
    }

    return  $model->count();
}
public function updateField(array $data = [])
{
    unset($data['user_id']);

    $data = parent::update($data);

    if($data->status == 'banned'){

        $serviceProvider = app('ServiceProviderProfileRepository')->findByAttribute('user_id', $data->id);

        if($serviceProvider){

            $updateData = ['is_verified' => 0, 'id' =>$serviceProvider->id];
            app('ServiceProviderProfileRepository')->update($updateData);
        }

        $data;
    }

    return $data;
}

/**
* This method will fetch single model by attribute
* and will return output back to client as json
*
* @access public
* @return mixed
*
* @author Usaama Effendi <usaamaeffendi@gmail.com>
**/
public function findByCriteria($criteria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false)
{

    $model = $this->model->newInstance()
    ->where($criteria);

    if($whereIn) {
        $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);

    }

    if($count) {
        return $model->count();
    }

    $model = $model->first(['id']);

    if ($model != null) {
        $model = $this->findById($model->id, $refresh, $details, $encode);
    }
    return $model;
}


}
