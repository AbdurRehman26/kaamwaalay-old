<?php

namespace App\Data\Repositories;

use App\Data\Models\Role;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Events\ServiceProviderStatusEvent;
use Carbon\Carbon;
use DB;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class ServiceProviderProfileRequestRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of ServiceProviderProfileRequest Class.
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
     * Example: ServiceProviderProfileRequest-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'service-provider-profile-request';
    protected $_cacheTotalKey = 'total-service-provider-profile-request';

    public function __construct(ServiceProviderProfileRequest $model)
    {
        $this->model = $model;
        $this->builder = $model;
    }

    public function findCollectionByCriteria($criteria, $whereInModelIds = false)
    {
        $this->builder = $this->model->where($criteria);
        if (is_array($whereInModelIds)) {
            $this->builder = $this->builder->whereIn('id', $whereInModelIds);
        }

        return $this->findByAll();
    }


    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);

        if ($data) {
            $data->formatted_approved_at = Carbon::parse($data->approved_at)->format('F j, Y');
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $data->formatted_updated_at = Carbon::parse($data->updated_at)->format('F j, Y');
            
            if (! empty($data->approved_by)) {
                $data->approved_by_user = app('UserRepository')->findById($data->approved_by, false);
            }

            if ($details) {
                if (! empty($details['user_details'])) {
                    $data->user = app('UserRepository')->findById($data->user_id, false);
                }

                if (! empty($details['profile_details'])) {
                    $data->provider_profile = app('ServiceProviderProfileRepository')->findByAttribute('user_id', $data->user_id, false);
                }

                $criteria = ['service_provider_profile_request_id' => $data->id];
                $services = app('ServiceProviderServiceRepository')->findCollectionByCriteria($criteria, false, $details);
                $data->services = $services['data'];
                $input['provider_request_data'] = false;
                $input['profile_data'] = true;
                $serviceProviderProfile = app('UserRepository')->findById($data->user_id, false, $input);
                $data->service_provider_profile = $serviceProviderProfile;
            }
        }


        return $data;
    }

    public function getSubServices($criteria, $onlyIds = false)
    {
        $model = $this->model->where($criteria);
        if ($model != null) {
            $model = $model->
            leftJoin(
                'service_provider_services',
                function ($join) {
                    $join->on('service_provider_services.service_provider_profile_request_id', '=', 'service_provider_profile_requests.id');
                }
            )
            ->leftJoin(
                'services',
                function ($join) {
                    $join->on('services.id', '=', 'service_provider_services.service_id');
                }
            )
            ->whereNotNull('services.parent_id');
            

            if (! $onlyIds) {
                $model = $model->where(function ($query) {
                    $query->where('service_provider_services.deleted_at', '=', null)
                        ->orWhere('service_provider_services.deleted_at', '!=', null);
                });
                $model = $model->pluck('services.id', 'services.title');
            } else {
                $model = $model->whereNull('service_provider_services.deleted_at');
                $model = $model->pluck('services.id');
            }

            $model = $model->toArray();

            return $model;
        }

        return false;
    }

    public function findByAll($pagination = false, $perPage = 10, $data = [])
    {
        $this->builder = $this->model->orderBy('service_provider_profile_requests.created_at', 'desc');
        if (! empty($data['keyword'])) {
            $this->builder = $this->builder->leftJoin(
                'users',
                function ($join) use ($data) {
                    $join->on('users.id', '=', 'service_provider_profile_requests.user_id');
                }
            )->where(
                function ($query) use ($data) {
                    $query->where(DB::raw('concat(users.first_name," ",users.last_name)'), 'LIKE', "%{$data['keyword']}%");
                }
            );
        }

        if (! empty($data['filter_by_business_type'])) {
            $this->builder = $this->builder->leftJoin(
                'service_provider_profiles',
                function ($join) use ($data) {
                    $join->on('service_provider_profiles.user_id', '=', 'service_provider_profile_requests.user_id');
                }
            )->where('service_provider_profiles.business_type', $data['filter_by_business_type'])
            ->select('service_provider_profile_requests.*');
        }

        if (! empty($data['filter_by_service'])) {
            $ids = app('ServiceRepository')->model->where('id', $data['filter_by_service'])
            ->orWhere('parent_id', $data['filter_by_service'])
            ->pluck('id')->toArray();



            $this->builder = $this->builder->leftJoin(
                'service_provider_services',
                function ($join) use ($data) {
                    $join->on('service_provider_profile_requests.id', '=', 'service_provider_services.service_provider_profile_request_id');
                }
            )->whereIn('service_provider_services.service_id', $ids);
        }

        if (! empty($data['filter_by_status'])) {
            $this->builder = $this->builder->where('service_provider_profile_requests.status', '=', $data['filter_by_status']);
        }

        $this->builder = $this->builder->select('service_provider_profile_requests.*');


        $data['details'] = ['details' => ['show' => true]];

        return parent::findByAll($pagination, $perPage, $data);
    }


    public function update(array $data = [])
    {
        if ($data['role_id'] == Role::ADMIN | $data['role_id'] == Role::REVIEWER) {
            unset($data['role_id']);
            $data['approved_by'] = $data['user_id'];
            unset($data['user_id']);
            if ($data['status'] == 'approved') {
                $data['approved_at'] = Carbon::now();
            }

            $data = parent::update($data);

            if ($data->status == 'rejected') {
                $criteria = ['service_provider_profile_request_id' => $data->id];
                app('ServiceProviderServiceRepository')->bulkDeleteByCriteria($criteria);
            }


            $user = app('UserRepository')->model->find($data->user_id);
            event(new ServiceProviderStatusEvent($user, $data->status, $data->reason));

            return $data;
        }

        return $data;
    }

    /**
     * This method will fetch single model by attribute
     * and will return output back to client as json
     *
     * @access public
     * @return mixed
     *
     * @author Usaama Effendi <usaamaeffendi@gmail.com>
     **/
    public function findByCriteria($criteria, $refresh = false, $details = false, $encode = true, $whereIn = false)
    {
        $model = $this->model->newInstance()
                ->where($criteria);
                
        if (! empty($details['orderBy'])) {
            $model = $model->orderBy('created_at', $details['orderBy']);
        }

        if ($whereIn) {
            $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
        }

        $model = $model->first(['id']);

        if ($model != null) {
            $model = $this->findById($model->id, $refresh, $details, $encode);
        }

        return $model;
    }

    public function getUserServices($criteria)
    {
        $this->builder = $this->model->join('service_provider_services', 'service_provider_services.service_provider_profile_request_id', 'service_provider_profile_requests.id')
                ->where('service_provider_profile_requests.user_id', $criteria['user_id'])
                ->where('service_provider_profile_requests.status', '!=', 'rejected');

        return $this->builder->select([
                        'service_provider_profile_requests.status',
                        'service_provider_services.id',
                        'service_provider_services.service_id',
                        'service_provider_services.service_provider_profile_request_id',
                    ])->get();
    }
    public function getAllServices($criteria)
    {
        $model = $this->model->where($criteria);
        if ($model != null) {
            $model = $model->
                    leftJoin(
                        'service_provider_services',
                        function ($join) {
                            $join->on('service_provider_services.service_provider_profile_request_id', '=', 'service_provider_profile_requests.id');
                        }
                    )
                    ->leftJoin(
                        'services',
                        function ($join) {
                            $join->on('services.id', '=', 'service_provider_services.service_id');
                        }
                    )->where('service_provider_profile_requests.status', '=', 'approved')->get();
                    
                    
            return $model;
        }

        return false;
    }
}
