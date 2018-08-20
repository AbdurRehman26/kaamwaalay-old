<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Models\Role;
use Carbon\Carbon;
use DB;

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
        $data->formatted_approved_at = Carbon::parse($data->approved_at)->format('F j, Y');
        $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
        $data->formatted_updated_at = Carbon::parse($data->updated_at)->format('F j, Y');
        

        if($data && $details){

            if(!empty($details['user_details'])){
                $data->user = app('UserRepository')->findById($data->user_id,false);
            }

            if(!empty($details['profile_details'])){
                $data->provider_profile = app('ServiceProviderProfileRepository')->findByAttribute('user_id', $data->user_id,false);
            }

            if(!empty($data->approved_by)){
                
                $data->approved_by_user = app('UserRepository')->findById($data->approved_by,false);

            }

            $criteria = ['service_provider_profile_request_id' => $data->id];
            $services = app('ServiceProviderServiceRepository')->findCollectionByCriteria($criteria, false, $details);
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

    public function findByAll($pagination = false,$perPage = 10, $data = []){       

        $this->builder = $this->model->orderBy('service_provider_profile_requests.created_at','desc');
        if (!empty($data['keyword'])) {

            $this->builder = $this->builder->leftJoin('users', function ($join)  use($data){
                $join->on('users.id', '=', 'service_provider_profile_requests.user_id');
            })->where(function($query)use($data){
                $query->where(DB::raw('concat(users.first_name," ",users.last_name)') , 'LIKE' , "%{$data['keyword']}%");
            });
        }

        if(!empty($data['filter_by_business_type'])){
            $this->builder = $this->builder->leftJoin('service_provider_profiles', function ($join)  use($data){
                $join->on('service_provider_profiles.user_id', '=', 'service_provider_profile_requests.user_id');
            })->where('service_provider_profiles.business_type',$data['filter_by_business_type'])
            ->select('service_provider_profile_requests.*');
        }

        if(!empty($data['filter_by_service'])){
            $this->builder = $this->builder->leftJoin('service_provider_services', function ($join)  use($data){
                $join->on('service_provider_profile_requests.id', '=', 'service_provider_services.service_provider_profile_request_id');
            })->where('service_provider_services.service_id',$data['filter_by_service'])
            ->select('service_provider_profile_requests.*');
        }

        $data['details'] = ['details' => ['show' => true]];
        return parent::findByAll($pagination, $perPage, $data);

    }


    public function update(array $data = []) {

        if ($data['role_id'] == Role::ADMIN) {
            unset($data['role_id']);
            $data['approved_by'] = $data['user_id'];  
            unset($data['user_id']);
            if ($data['status'] == 'approved') {
                $data['approved_at'] = Carbon::now();
                
            }
            return parent::update($data);
            
        }
        return false;


    }

            /**
     *
     * This method will fetch single model by attribute
     * and will return output back to client as json
     *
     * @access public
     * @return mixed
     *
     * @author Usaama Effendi <usaamaeffendi@gmail.com>
     *
     **/
            public function findByCriteria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false) {
                $model = $this->model->newInstance()
                ->where($crtieria);
                if($whereIn){
                    $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
                }

                $model = $model->first(['id']);

                if ($model != NULL) {
                    $model = $this->findById($model->id, $refresh, $details, $encode);
                }
                return $model;
            }


        }
