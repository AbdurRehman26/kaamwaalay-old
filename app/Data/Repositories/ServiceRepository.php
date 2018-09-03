<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Storage;
use App\Data\Models\Service;
use App\Data\Models\Role;

class ServiceRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Service Class.
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
     * Example: Service-1
     *
     * @var    string
     * @access protected
     **/
    protected $cacheTag = true;
    protected $_cacheKey = 'Service';
    protected $_cacheTotalKey = 'total-Service';

    public function __construct(Service $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->jobRepo = app('JobRepository');
        $this->serviceProviderRepo = app('ServiceProviderServiceRepository');

    }
    public function findById($id, $refresh = false, $details = false, $encode = true, $input =  [])
    {
        $data = parent::findById($id, $refresh, $details, $input);
        if ($data) {
            if($data->parent_id != null) {
                $data->parent = $this->findById($data->parent_id);
                
            }else{

                $data->parent = '';
            }
            $jobInitCriteria = ['status' => 'initiated', 'service_id' => $data->id];
            $data->job_init_count = $this->jobRepo->getTotalCountByCriteria($jobInitCriteria);
            $jobFinishedCriteria = ['status' => 'completed', 'service_id' => $data->id];
            $data->job_finished_count = $this->jobRepo->getTotalCountByCriteria($jobFinishedCriteria);
            
            $serviceProdiderCriteria = ['service_id' => (int)$data->id];
            $data->service_prodider_count = $this->serviceProviderRepo->getTotalCountByCriteria($serviceProdiderCriteria);
        }
        
        return $data;
    }

    public function getServiceCount()
    {
        return $this->model->count();
    }

    public function create(array $data = [])
    {
        
        unset($data['user_id']);
        if (!empty($data['parent_id'])) {

            $parentExist = Service::where('id', '=', $data['parent_id'])->whereNull('parent_id')->count();

            if ($parentExist) {
                return parent::create($data);
            }else{
                return 'not_parent';
            }
        }else{
            return parent::create($data);
        }
    }
    public function update(array $data = [])
    {
        $record = [];
        unset($data['user_id']);
        if (!empty($data['parent_id'])) {
            $parentExist = Service::where('id', '=', $data['id'])->whereNull('parent_id')->count();
            if ($parentExist) {
                return 'not_parent';
            }else{
                return parent::update($data);
            }
            
        }else{
            if($data['status'] == 0) {
                $criteria = ['service_id' => (int)$data['id']];
                $record['error'] = 1;
                $record['jobs_count'] = $this->jobRepo->getTotalCountByCriteria($criteria);
                $serviceProviderCriteria = ['service_id' => (int)$data['id']];
                $record['service_provider_count'] = $this->serviceProviderRepo->getTotalCountByCriteria($criteria);
                if($record['jobs_count'] || $record['service_provider_count']) {
                    return (object)$record;
                }   
            }
            return parent::update($data);
        }


    }


    public function findByAll($pagination = false,$perPage = 10, $data = [])
    {       

        $this->builder = $this->model->orderBy('created_at', 'desc');

        if (!empty($data['zip_code'])) {
            $this->builder = $this->builder
                ->leftJoin(
                    'service_provider_services', function ($join) use ($data) {
                                $join->on('service_provider_services.service_id', '=', 'services.id');
                    }
                )->
            leftJoin(
                'service_provider_profile_requests', function ($join) use ($data) {
                                $join->on('service_provider_services.service_provider_profile_request_id', '=', 'service_provider_services.id');
                }
            )->
            leftJoin(
                'users', function ($join) use ($data) {
                                $join->on('users.id', '=', 'service_provider_profile_requests.user_id');
                }
            )
            ->where('service_provider_profile_requests.status', 'approved')
            ->where('users.role_id', Role::SERVICE_PROVIDER)
            ->where('users.zip_code', $data['zip_code'])
            ->select(['services.id']);
        }

        if(isset($data['filter_by_featured'])) {
                        
            $this->builder = $this->builder->where('is_featured', '=', (int)$data['filter_by_featured']);

        }
        if (!empty($data['keyword'])) {

            // $this->builder = $this->builder->where(function($query) use($data){
            //     $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
            //     //$query->orWhere('services.description', 'like', "%{$data['keyword']}%");

            // });
            $ids = $this->builder->where(
                function ($query) use ($data) {
                                $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
                }
            )->pluck('id')->toArray();
            if(!$ids && isset($data['filter_by_featured'])) {

                $ids = $this->model->where(
                    function ($query) use ($data) {
                                    $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
                    }
                )->pluck('id')->toArray();

                $this->builder = $this->model->whereIn('services.parent_id', $ids)->where('is_featured', '=', (int)$data['filter_by_featured'])->orderBy('created_at', 'desc');
            } else {
                $this->builder = $this->builder->whereIn('services.id', $ids)->whereIn('services.parent_id', $ids, 'or');

                if(isset($data['filter_by_featured'])) {
                                
                    $this->builder = $this->builder->where('is_featured', '=', (int)$data['filter_by_featured']);

                }
            }
            // $this->builder = $this->builder->where(function($query) use($ids){
            //     $query->whereIn('services.id', $ids);
            //     $query->whereIn('services.parent_id', $ids, 'or');
            // });
                        
        }

                    //$modelData['data'] = [];
                    //$count = $this->builder->count();
                    //$modelData['data'] = parent::findByAll($pagination, $perPage, $data);
                    //$modelData['data']['service_count'] = $count;
                    return parent::findByAll($pagination, $perPage, $data);
    }


    public function deleteById($id)
    {
        $model = $this->model->find($id);
        if($model->parent_id == null) {
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
        if($model != null) {
            //Cache::forget($this->_cacheKey.$id);
            //Cache::forget($this->_cacheTotalKey);
            return $model->delete();
        }
        return false;
    }
}
