<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\User;

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

        if($data->role_id == Role::SERVICE_PROVIDER){
            // Todo
        }

        if($data->role_id == Role::CUSTOMER){
            // Todo
        }

        return $data;
    }

    public function update(array $data = []) {

        $input = $data;

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
                if($business = $app('ServiceProviderProfile')->findByAttribute('user_id' , $user->id)){
                    $business_details['id'] = $business->id;
                    $user->business_details = app('ServiceProviderProfile')->update($business_details);
                }else{
                    $user->business_details = app('ServiceProviderProfile')->create($business_details);
                }
            }

            if(!empty($data['services'])){
                foreach ($data['services'] as $key => $service) {
                    if($service->id){
                        $existingServiceIds[$service->service_provider_profile_request_id][] = $service->id;
                        $existingServices[] = $service;
                    }else{
                        $newServices[] = $service;
                    }
                }
                if(!empty($newServices)){
                    $serviceProfileRequest = app('ServiceProviderProfileRequest')->create(['user_id' => $user->id]);
                    foreach ($newServices as $key => $newService) {
                        $newServices[$key]['service_provider_profile_request_id'] = $serviceProfileRequest->id; 
                    }
                    app('ServiceProviderServices')->model->insert($newServices);
                }

                if(!empty($existingServiceIds)){
                    foreach ($existingServiceIds as $key => $existingService) {
                        app('ServiceProviderServices')->where('service_provider_profile_request_id' , $key)->whereNotIn($existingService)->delete();
                    }
                }
                app('ServiceProviderServices')->model->insertOnDuplicateKey($existingServices);

                $user = self::findById($user->id , true);
            }            
            return $user;
        }


        return false;
    }
}
