<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Service;
use App\Data\Models\Role;

class ServiceRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Service Class.
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
     * Example: Service-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Service';
    protected $_cacheTotalKey = 'total-Service';

    public function __construct(Service $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
    public function findById($id, $refresh = false, $details = false, $encode = true, $input =  []) {
        $data = parent::findById($id, $refresh, $details, $input);

        if ($data) {
            if($data->parent_id != NULL){
                $data->parent = $this->findById($data->parent_id);
                
            }else{

            $data->parent = '';
            }
        }
        
        return $data;
    }

    public function create(array $data = []) {
        unset($data['user_id']);

        return parent::create($data);
    }
    public function update(array $data = []) {
        
        unset($data['user_id']);
        
        if (!empty($data['parent_id'])) {
            $parentExist = Service::where('id','=',$data['parent_id'])->whereNull('parent_id')->count();
            if ($parentExist) {
                return parent::update($data);
                
            }else{
                return 'not_parent';
            }
            
        }else{
            return parent::update($data);
        }


    }


    public function findByAll($pagination = false,$perPage = 10, $data = []){       

        $this->builder = $this->model->orderBy('created_at','desc');

        if (!empty($data['zip_code'])) {
            $this->builder = $this->builder->
            leftJoin('service_provider_services', function ($join)  use($data) {
                $join->on('service_provider_services.service_id', '=', 'services.id');
            })->
            leftJoin('service_provider_profile_requests', function ($join)  use($data) {
                $join->on('service_provider_services.service_provider_profile_request_id', '=', 'service_provider_services.id');
            })->
            leftJoin('users', function ($join)  use($data) {
                $join->on('users.id', '=', 'service_provider_profile_requests.user_id');
            })
            ->where('service_provider_profile_requests.status','approved')
            ->where('users.role_id',Role::SERVICE_PROVIDER)
            ->where('users.zip_code',$data['zip_code'])
            ->select(['services.id']);
        }

        if (!empty($data['keyword'])) {
            
            $this->builder = $this->builder->where(function($query)use($data){
                $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
                $query->orWhere('services.description', 'like', "%{$data['keyword']}%");
            
            });
        }
        if(!empty($data['filter_by_featured'])){
            $this->builder = $this->builder->where('is_featured','=',$data['filter_by_featured']);
        }
        
        return parent::findByAll($pagination, $perPage, $data);

    }

}
