<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfileRequest;

class ServiceProviderProfileRequestRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of ServiceProviderProfileRequest Class.
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
     * Example: ServiceProviderProfileRequest-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'ServiceProviderProfileRequest';
    protected $_cacheTotalKey = 'total-ServiceProviderProfileRequest';

    public function __construct(ServiceProviderProfileRequest $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findCollectionByCriteria($criteria , $whereInModelIds = false)
    {
        $this->builder = $this->model->where($criteria);
        if(is_array($whereInModelIds)){
            $this->builder = $this->builder->whereIn('id' , $whereInModelIds);
        }

        return $this->findByAll();
    }


    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        
        if($data){
            $criteria = ['service_provider_profile_request_id' => $data->id];
            $services = app('ServiceProviderServiceRepository')->findCollectionByCriteria($criteria);
            $data->services = $services['data']; 
            
            $input['provider_request_data'] = false;
            $input['profile_data'] = true;
            $serviceProviderProfile = app('UserRepository')->findById($data->user_id,false,$input);
            $data->service_provider_profile= $serviceProviderProfile;
            
        }

        return $data;
    }

    public function getSubServices($crtieria) {
        
        $model = $this->model->where($crtieria);
        if ($model != NULL) {
            $model = $model->
                leftJoin('service_provider_services', function ($join) {
                    $join->on('service_provider_services.service_provider_profile_request_id', '=', 'service_provider_profile_requests.id');
                })
                ->leftJoin('services', function ($join) {
                    $join->on('services.id', '=', 'service_provider_services.service_id');
                })
                ->whereNotNull('services.parent_id')
                ->pluck('services.title','services.id')->toArray();
            
            return $model;
        }
        return false;
    }


}
