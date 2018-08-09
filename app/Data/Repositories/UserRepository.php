<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\User;
use App\Data\Models\Role;

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

    }


    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        
        if($data){
            if (empty($details)) {
                
                if($data->role_id == Role::SERVICE_PROVIDER){
                // Todo
                    $data->business_details = app('ServiceProviderProfileRepository')->findByAttribute('user_id' , $id);                

                    $serviceDetailsCriteria = ['user_id' => $id];
                    $data->service_details = app('ServiceProviderProfileRequestRepository')->findCollectionByCriteria($serviceDetailsCriteria);                

                }
            }

            if($data->role_id == Role::CUSTOMER){
            // Todo
            }
        }

        return $data;
    }



    public function findByAll($pagination = false,$perPage = 10, $data = []){       

        $this->builder = $this->model->orderBy('created_at','desc');

        if (!empty($data['keyword'])) {

            $this->builder = $this->builder->where(function($query)use($data){
                $query->where('email', 'LIKE', "%{$data['keyword']}%");
                $query->orWhere('first_name', 'like', "%{$data['keyword']}%");
                $query->orWhere('last_name', 'like', "%{$data['keyword']}%");
            });
        }

        if(!empty($data['filter_by_status'])){
            $this->builder = $this->builder->where('status','=',$data['filter_by_status']);
        }

        if(!empty($data['filter_by_role'])){
            $this->builder = $this->builder->where('role_id','=',$data['filter_by_role']);
        }

        
        return parent::findByAll($pagination, $perPage, $data);

    }

    public function update(array $data = []) {

        $input = $data['user_details'];
        $input['id'] = $data['id'];

        if(!empty($data['user_details'])){

            if(request()->hasFile('user_details.profile_image')){
                $data['profile_image'] = $data['user_details']['profile_image']->hashName();
                $this->imageStore($data['profile_image'],$data['profile_image']);
                $input['profile_image'] = $data['profile_image'];
                unset($data['profile_image']);
            }

        }

        if ($user = parent::update($input)) {

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
                foreach ($data['service_details'] as $key => $service) {
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

                $user = self::findById($user->id , true);
            }            
            return $user;
        }


        return false;
    }
}
