<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\User;
use App\Data\Models\Role;
use DB;
use Carbon\Carbon;

class UserRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of User Class.
     *
     * @var object
     * @access public
     *
     **/
public $model;

    /**
     *
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: User-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'User';
    protected $_cacheTotalKey = 'total-User';

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->roleRepo = app('RoleRepository');

    }


    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        if($data){
            if (!empty($details['profile_data'])) {
        
                if($data->role_id == Role::SERVICE_PROVIDER){
                // Todo
                    $data->business_details = app('ServiceProviderProfileRepository')->findByAttribute('user_id' , $id,false,true);                
                    if (!empty($details['provider_request_data'])) {
                        $serviceDetailsCriteria = ['user_id' => $id];
                        $data->service_details = app('ServiceProviderProfileRequestRepository')->findCollectionByCriteria($serviceDetailsCriteria);                
                    }

                }   
            }
                
            if (!empty($details['user_rating'])) {
                    $criteria = ['user_id' => $id];
                    $data->average_rating = app('UserRatingRepository')->getAvgRatingCriteria($criteria);
            }

            if($data->role_id == Role::CUSTOMER){
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
                
                
            }
            $country = app('CountryRepository')->findById($data->country_id);             
            $data->country = !empty($country->name) ? $country->name : '';
            $City = app('CityRepository')->findById($data->city_id);                
            $data->City = !empty($City->name)?$City->name:'';
            $state = app('StateRepository')->findById($data->state_id);                
            $data->state = !empty($state->name)?$state->name:'';

            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');

            if (!empty($details['role'])) {
                $data->role = $this->roleRepo->findById($data->role_id);
            }

        }

        return $data;
    }



    public function findByAll($pagination = false,$perPage = 10, $data = []){       
        $this->builder = $this->model->where('id', '<>', User::GLOBAL_ADMIN)->orderBy('users.created_at','desc');

        if (!empty($data['keyword'])) {

            $this->builder = $this->builder->where(function($query)use($data){
                $query->where(DB::raw('concat(first_name," ",last_name)') , 'LIKE' , "%{$data['keyword']}%");
            });
        }

        if(!empty($data['filter_by_status'])){
            $this->builder = $this->builder->where('status','=',$data['filter_by_status']);
        }

        if(!empty($data['filter_by_role'])){
            $this->builder = $this->builder->where('role_id','=',$data['filter_by_role']);
        }
       if(!empty($data['filter_by_roles'])){
            $this->builder = $this->builder->whereIn('role_id',$data['filter_by_roles']);
        }
        if(!empty($data['filter_by_service'])){

            $this->builder->leftJoin('jobs', function ($join)  use($data){
                $join->on('jobs.user_id', '=', 'users.id');
            })->where('jobs.service_id',$data['filter_by_service'])
            ->select(['users.id'])
            ->groupBy('users.id');
        }

        
        return parent::findByAll($pagination, $perPage, $data);

    }

    public function update(array $data = []) {

        $input = $data['user_details'];
        

        $input['id'] = $data['id'];
        
        if ($user = parent::update($input)) {

            if($user->role_id == Role::SERVICE_PROVIDER){

                if(!empty($data['business_details'])){

                    $business_details = $data['business_details']; 
                    $business_details['user_id'] = $user->id;
                    if($business = app('ServiceProviderProfileRepository')->findByAttribute('user_id' , $user->id)){
                        $business_details['id'] = $business->id;
                        $user->business_details = app('ServiceProviderProfileRepository')->update($business_details);
                    }else{
                        $user->business_details = app('ServiceProviderProfileRepository')->create($business_details);
                    }
                }

                if(!empty($data['service_details'])){

                    $criteria = ['user_id' => $input['id'] , 'status' => 'pending'];

                    $profileRequest = app('ServiceProviderProfileRequestRepository')->findByCriteria($criteria);
                    
                    if(!$profileRequest){


                        foreach ($data['service_details'] as $key => $service) {
                            if(empty($service['service_id'])){
                                continue;
                            }
                            
                            if(!empty($service['id'])){

                                $existingServiceIds[$service['id']][] = $service['service_id'];
                                $service['service_provider_profile_request_id'] = $service['id'];
                                unset($service['id']);

                                $service['deleted_at'] = null;
                                $existingServices[] = $service;

                            }else{
                                $newServices[] = $service;
                            }
                        }

                        if(!empty($newServices)){
                            $serviceProfileRequest = app('ServiceProviderProfileRequestRepository')->create(['user_id' => $user->id]);
                            foreach ($newServices as $key => $newService) {
                                $newServices[$key]['service_provider_profile_request_id'] = $serviceProfileRequest->id; 
                            }
                            app('ServiceProviderServiceRepository')->model->insert($newServices);
                        }

                        if(!empty($existingServiceIds)){
                            foreach ($existingServiceIds as $key => $existingServiceId) {
                                app('ServiceProviderServiceRepository')->model
                                ->where('service_provider_profile_request_id' , $key)
                                ->whereNotIn('id', $existingServiceId)->delete();
                            }

                            app('ServiceProviderServiceRepository')->model->insertOnDuplicateKey($existingServices);

                        }
                    }

                }

                $details = ['profile_data' => true , 'provider_request_data' => true];
                $user = self::findById($user->id , true, $details);
            }


            return $user;
        }


        return false;
    }

    public function getTotalCountByCriteria($crtieria = [], $startDate = NULL, $endDate = NULL) {

        $model = $this->model;
        
        if($crtieria)
            $model = $model->where($crtieria);

        if($startDate && $endDate)
            $model = $model->whereBetween('created_at', [$startDate, $endDate]);

        return  $model->count();
    }
    public function updateField(array $data = []) {
        unset($data['user_id']);
       return parent::update($data);
    }

}
