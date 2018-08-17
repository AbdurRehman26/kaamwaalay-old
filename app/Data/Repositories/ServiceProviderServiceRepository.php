<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderService;

class ServiceProviderServiceRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of ServiceProviderService Class.
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
     * Example: ServiceProviderService-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'ServiceProviderService';
    protected $_cacheTotalKey = 'total-ServiceProviderService';

    public function __construct(ServiceProviderService $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findCollectionByCriteria($criteria , $whereInModelIds = false, $details = [])
    {
        $this->builder = $this->model->where($criteria);
        if(is_array($whereInModelIds)){
            $this->builder = $this->builder->whereIn('id' , $whereInModelIds);
        }
        
        if($details){
            $details = ['details' => true];
        }else{
            $details = ['details' => false];
        }

        return $this->findByAll(false, 10, $details);
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        
        if($data && $details){

            $data->service = app('ServiceRepository')->findById($data->service_id);
            
        }

        return $data;
    }


}
