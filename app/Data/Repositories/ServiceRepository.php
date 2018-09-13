<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Storage;
use App\Data\Models\Service;
use App\Data\Models\Role;
use DB;

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
    
    protected $_cacheKey = 'service';
    protected $_cacheTotalKey = 'total-service';

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
            $data->url_suffix = $data->url_suffix? $data->url_suffix : url(config('view.service.url.folder')).'/';
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
        if(isset($data['filter_by_status'])) {
                        
            $this->builder = $this->builder->where('status', '=', (int)$data['filter_by_status']);

        }
        if(isset($data['service_name'])) {
            $this->builder = $this->builder->where('url_suffix', '=', $data['service_name'])->where('status', '=', 1);
            
        }
        if(isset($data['filter_by_related_services'])) {
            $this->builder = $this->builder->where('id', '=', $data['filter_by_related_services'])->where('is_display_service_nav', '=', 1)->where('status', '=', 1);

            $isParent = $this->builder->whereNull('parent_id')->get()->toArray();
            if(!$isParent) {
                $this->builder = $this->getPopularServices();
            }else {
                $this->builder = $this->model->where('id', '!=', $data['filter_by_related_services'])->where('parent_id', '=', $data['filter_by_related_services'])->where('is_display_service_nav', '=', 1)->where('status', '=', 1);
                if(!$this->builder->get()->toArray()) {
                    $this->builder = $this->getPopularServices();
                }
            }
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
                                
                    $this->builder = $this->builder->where('is_featured','=',(int)$data['filter_by_featured']);

                }
            }
            // $this->builder = $this->builder->where(function($query) use($ids){
            //     $query->whereIn('services.id', $ids);
            //     $query->whereIn('services.parent_id', $ids, 'or');
            // });
                        
        }
        $modelData['data'] = [];
        if (!empty($data['service_category'])) {
            if($data['service_category'] == 'All') {
                $services = $this->model->orderBy('created_at', 'desc')->where('status', '=', 1)->whereNull('parent_id')->get();
                foreach ($services as $key => $value) {
                    // $subservice = $this->getAllServicesByCategory($value->id, true, 3);
                     $subservice = $this->model->orderBy('created_at', 'desc')->where('parent_id', '=', $value->id)->get();
                    $services[$key]->subservices = $subservice;
                }
                $modelData['data'] = $services;
                //$modelData['data']['service_count'] = sizeof($services);
                return $modelData;
            }
        }
                    //$modelData['data'] = [];
                    //$count = $this->builder->count();
                    //$modelData['data'] = parent::findByAll($pagination, $perPage, $data);
                    //$modelData['data']['service_count'] = $count;
                    return parent::findByAll($pagination, $perPage, $data);
    }

    public function getPopularServices() {
        return $this->model
                ->leftJoin('jobs', function ($join) {
                    $join->on('jobs.service_id', '=', 'services.id');
                })
                ->select('services.id')
                ->groupby('service_id')   
                ->orderBy(DB::raw('COUNT(service_id)'), 'desc')
                ->limit(3);
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
    public function getAllServicesByCategory($servicesId, $pagination = false, $perPage = 10, $data = []) {

        if($servicesId) {
            $this->builder = $this->model->where('parent_id', '=', $servicesId);
        }

        return  parent::findByAll($pagination, $perPage, $data);
    }
}

