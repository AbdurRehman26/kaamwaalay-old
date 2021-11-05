<?php

namespace App\Data\Repositories;

use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfile;
use DB;
use Carbon\Carbon;
use App\Data\Models\Role;
use Storage;

class ServiceProviderProfileRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of ServiceProviderProfile Class.
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
     * Example: ServiceProviderProfile-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'service-provider-profile';
    protected $_cacheTotalKey = 'total-service-provider-profile';

    public function __construct(ServiceProviderProfile $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findById($id, $refresh = false, $details = false, $encode = true, $input =  [])
    {
        $data = parent::findById($id, $refresh, $details, $input);
        if ($data) {
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $data->user_detail = app('UserRepository')->findById($data->user_id, false, $details);
            $bidsCriteria = ['user_id' => $data->user_id,'is_awarded'=>1];
            $awardedJobs = app('JobBidRepository')->getCountByCriteria($bidsCriteria, false);
            $data->initiated_jobs = $awardedJobs;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id, 'job_bids.status'=>'completed'];
            $finishedJobs = app('JobBidRepository')->getCompletedJobs($bidsCriteria, false);
            $data->finished_jobs = $finishedJobs;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'job_bids.status'=>'completed'];
            $urgentJobsCompleted = app('JobBidRepository')->getUrgentJobsCompleted($bidsCriteria);
            $data->urgent_jobs_completed = $urgentJobsCompleted;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id];
            $data->urgent_jobs_created  = app('JobBidRepository')->getUrgentJobsCompleted($bidsCriteria);


            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'job_bids.status'=>'completed'];
            $totalRevenue = app('JobBidRepository')->getTotalRevenueCriteria($bidsCriteria);

            $data->total_revenue = number_format($totalRevenue, 2, '.', '');

            $servicesCriteria = ['service_provider_profile_requests.user_id' => $data->user_id,'service_provider_profile_requests.status'=>'approved'];
            $subServices = app('ServiceProviderProfileRequestRepository')->getSubServices($servicesCriteria, false);
            $data->services_offered = (object) $subServices;


            $allServicesCriteria = ['user_id' => $data->user_id];
            $allServices = app('ServiceProviderProfileRequestRepository')->getAllServices($allServicesCriteria, false);
            $data->all_services_offered = $allServices;

            $crtieria = ['user_id' => $data->user_id, 'status'=>'approved'];
            $profile = app('ServiceProviderProfileRequestRepository')->findByCriteria($crtieria, false);
            if($profile){
                $profile->formatted_created_at = Carbon::parse($profile->approved_at)->format('F j, Y');
            }
            $data->profile_request = $profile;

            // \Log::info("Attachments");
            // \Log::info(json_encode($data->attachments));
            // \Log::info("");
            //
            // if(!empty($data->attachments)){
            //     foreach ($data->attachments as $key => $value) {
            //         foreach ($data->attachments[$key] as $childKey => $childValue) {
            //             if($childValue){
            //                 if(!empty($childValue['name'])){
            //                     $data->attachmentsUrl[$key][$childKey]['name'] = Storage::url(config('uploads.service_provider.folder').'/'.$childValue['name']);
            //                     $data->attachmentsUrl[$key][$childKey]['original_name'] = $childValue['original_name'];
            //                 }
            //             }
            //         }
            //
            //     }
            // }

            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
      }

      return $data;
  }



  public function findByAll($pagination = false,$perPage = 10, $data = []){

    $this->builder = $this->model->join('users' , 'users.id' , 'service_provider_profiles.user_id')
    ->where('users.role_id', '=', Role::SERVICE_PROVIDER);
    if (empty($data['filter_by_top_providers'])) {
        $this->builder = $this->builder->orderBy('service_provider_profiles.created_at','desc');
        $this->builder = $this->builder->orderBy('service_provider_profiles.id','desc');
    }

    if (!empty($data['keyword'])) {

        $this->builder = $this->builder->where(
            function ($query) use ($data) {
                $query->where(DB::raw('concat(users.first_name," ",users.last_name)'), 'LIKE', "%{$data['keyword']}%");
            }
        )->groupBy('service_provider_profiles.user_id');
    }

    if(!empty($data['filter_by_business_type'])) {
        $this->builder = $this->builder->where('service_provider_profiles.business_type', '=', $data['filter_by_business_type']);
    }


    if(!empty($data['filter_by_service'])){

        $this->builder = $this->builder->leftJoin('service_provider_profile_requests', function ($join)  use($data){
            $join->on('service_provider_profiles.user_id', '=', 'service_provider_profile_requests.user_id');
        })->join('service_provider_services', function($join) use ($data){
            $join->on('service_provider_profile_requests.id', '=', 'service_provider_services.service_provider_profile_request_id');
        })
        ->select('service_provider_profiles.*')
        ->groupBy('service_provider_profiles.user_id');

    }
    if(!empty($data['is_approved'])) {
            //$is_approved = $data['is_approved']? $data['is_approved'] : 'rejected';
        $this->builder = $this->builder->where('service_provider_profile_requests.status', '=', $data['is_approved']);
    }

    if(!empty($data['filter_by_featured'])){
        $this->builder = $this->builder->where('service_provider_profiles.is_featured','=',$data['filter_by_featured']);
    }

    if(!empty($data['filter_by_top_providers'])) {
        $this->builder = $this->builder
        ->leftJoin('user_ratings', function ($join){
            $join->on('service_provider_profiles.user_id', '=', 'user_ratings.user_id');
            $join->where('user_ratings.status', '=', 'approved');
        })
        ->leftJoin('job_bids', function ($join){
            $join->on('service_provider_profiles.user_id', '=', 'job_bids.user_id');
            $join->where('job_bids.status', '=', 'completed');
        })
        ->leftJoin('jobs', function ($join){
            $join->on('job_bids.job_id', '=', 'jobs.id');
            $join->where('jobs.status', '=', 'completed');
        })
        ->groupBy('service_provider_profiles.user_id')
        ->orderBy('service_provider_profiles.is_featured', 'desc')
        ->orderBy('service_provider_profiles.is_verified', 'desc')
        ->orderByRaw('(count(jobs.user_id) * IFNULL(avg(user_ratings.rating) + 1, 1)) desc');


    }

    $this->builder = $this->builder->select('service_provider_profiles.*');
    $record = parent::findByAll($pagination, $perPage, $data);
    return $record;

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
        public function findByCriteria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false)
        {
            $model = $this->model->newInstance()
            ->where($crtieria);
            if($whereIn) {
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
            }

            $model = $model->first(['id']);

            if ($model != null) {
                $model = $this->findById($model->id, $refresh, $details, $encode);
            }
            return $model;
        }

    }
