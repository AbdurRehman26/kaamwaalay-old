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
    protected $cacheTag = true;
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

    public function getServiceCount() {
        return $this->model->count();
    }

    public function create(array $data = []) {
        unset($data['user_id']);
        if (!empty($data['parent_id'])) {

            $parentExist = Service::where('id','=',$data['parent_id'])->whereNull('parent_id')->count();

            if ($parentExist) {
                return parent::create($data);
            }else{
                return 'not_parent';
            }
        }else{
            return parent::create($data);
        }
    }
    public function update(array $data = []) {
        dd($data);
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

        //select * from `psm`.`services` as p1 left join `psm`.`services` p2 on p1.id = p2.parent_id where p1.parent_id is null order by p1.id
       
        /*$this->builder = $this->builder
                    ->leftJoin('services AS s2', 'id', '=', 's2.parent_id')
                    ->whereNull('parent_id')
                    ->orderBy('id');*/

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
            
            $ids = $this->builder->where(function($query) use($data){
                $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
                //$query->orWhere('services.description', 'like', "%{$data['keyword']}%");
            
            })->pluck('id')->toArray();
            $this->builder->whereIn('id', $ids)->whereIn('parent_id', $ids, 'or');
        }
        if(isset($data['filter_by_featured'])){
            $this->builder = $this->builder->where('is_featured','=', $data['filter_by_featured']);
        }
        $modelData['data'] = [];
        $count = $this->builder->count();
        $modelData['data'] = parent::findByAll($pagination, $perPage, $data);
        $modelData['data']['service_count'] = $count;
        return $modelData;
    }


    public function deleteById($id) {
        $model = $this->model->find($id);
        if($model->parent_id == NULL) {
            $sub_model = $this->model->where('parent_id', '=', $id)->delete();
        }
        $this->cache()->flush();
        //Cache::tags(['Service'])->flush();
        // if($sub_model != NULL) {
        //     foreach ($sub_model as $model) {
        //         //Cache::forget($this->_cacheKey.$model->id);
        //         //Cache::forget($this->_cacheTotalKey);
        //         $model->delete();
        //     }
        // }
        if($model != NULL) {
            //Cache::forget($this->_cacheKey.$id);
            //Cache::forget($this->_cacheTotalKey);
            return $model->delete();
        }
        return false;
    }
}
