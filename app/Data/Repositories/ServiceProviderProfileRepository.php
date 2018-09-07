<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfile;
use DB;
use Carbon\Carbon;

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

            $data->user_detail = app('UserRepository')->findById($data->user_id, false, $details);

            $bidsCriteria = ['user_id' => $data->user_id,'is_awarded'=>1];
            $awardedJobs = app('JobBidRepository')->getCountByCriteria($bidsCriteria, false);
            $data->initiated_jobs = $awardedJobs;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'.job_bids.status'=>'completed'];
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

            $avgCriteria = ['user_id' => $data->user_id,'status'=>'approved'];
            $avgRating = app('UserRatingRepository')->getAvgRatingCriteria($avgCriteria, false);
            $data->avg_rating = $avgRating;
// findByCriteria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false)
            $reviewCriteria = ['user_id' => $data->user_id];
            $review = app('UserRatingRepository')->findByCriteria($reviewCriteria, false, false, false, false, false);
            $data->reviewedBy = null;
            if($review) {
                $review->formatted_created_at = Carbon::parse($review->created_at)->format('F j, Y');
                $data->reviewedBy['review'] = $review;
                $reviewedUser = app('UserRepository')->findById($review->rated_by);
                $data->reviewedBy['user_detail'] = $reviewedUser;
            }

            $avgCriteria = ['user_id' => $data->user_id,'status'=>'approved'];
            $totalFeedbackCount = app('UserRatingRepository')->getTotalFeedbackCriteria($avgCriteria, false);
            $data->total_feedback_count = $totalFeedbackCount;      

            $servicesCriteria = ['service_provider_profile_requests.user_id' => $data->user_id,'service_provider_profile_requests.status'=>'approved'];
            $subServices = app('ServiceProviderProfileRequestRepository')->getSubServices($servicesCriteria, false);
            $data->services_offered = $subServices;

            $crtieria = ['user_id' => $data->user_id, 'status'=>'approved'];
            $profile = app('ServiceProviderProfileRequestRepository')->findByCriteria($crtieria, false);
            if($profile){
                $profile->formatted_created_at = Carbon::parse($profile->approved_at)->format('F j, Y');
            }
            $data->profile_request = $profile;
            
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
        
               
        }
        
        return $data;
    }



    public function findByAll($pagination = false,$perPage = 10, $data = []){
        $this->builder = $this->model->orderBy('created_at','desc');
        if(!empty($data['zip'])) {
            $this->builder = $this->builder->leftJoin('users', function ($join)  use($data){
                $join->on('users.id', '=', 'service_provider_profiles.user_id');
            })->where(function($query)use($data){
                $query->where('users.zip_code', '=', $data['zip']);
            })->groupBy('service_provider_profiles.user_id');
        }

        if (!empty($data['keyword'])) {

            $this->builder = $this->builder->leftJoin(
                'users', function ($join) use ($data) {
                    $join->on('users.id', '=', 'service_provider_profiles.user_id');
                }
            )->where(
                function ($query) use ($data) {
                        $query->where(DB::raw('concat(users.first_name," ",users.last_name)'), 'LIKE', "%{$data['keyword']}%");
                }
            )->groupBy('service_provider_profiles.user_id');
        }

        if(!empty($data['filter_by_business_type'])) {
            $this->builder = $this->builder->where('service_provider_profiles.business_type', '=', $data['filter_by_business_type']);
        }
        

        if(!empty($data['filter_by_service'])){

            $ids = app('ServiceRepository')->model->where('id' , $data['filter_by_service'])
                ->orWhere('parent_id', $data['filter_by_service'])
                ->pluck('id')->toArray();


            $this->builder = $this->builder->leftJoin('service_provider_profile_requests', function ($join)  use($data, $ids){
                    $join->on('service_provider_profile_requests.user_id', '=', 'service_provider_profiles.user_id');
            })->join('service_provider_services', function($join) use ($data){
                        $join->on('service_provider_profile_requests.id', '=', 'service_provider_services.service_provider_profile_request_id');    
            })->whereIn('service_provider_services.service_id', $ids)

            ->select('service_provider_profiles.*')
            ->groupBy('service_provider_profiles.user_id');
        }
        if(!empty($data['is_approved'])) {
            $is_approved = $data['is_approved']? $data['is_approved'] : 'rejected';
            $this->builder = $this->builder->where('service_provider_profile_requests.status', '=', $is_approved);
        }

        if(!empty($data['filter_by_featured'])){
            $this->builder = $this->builder->where('service_provider_profiles.is_featured','=',$data['filter_by_featured']);
        }


        if(!empty($data['filter_by_featured']) && $data['filter_by_featured'] == "1" || !empty($data['is_verified']) && $data['is_verified'] == "1") {
            $this->builder = $this->builder
               ->select(DB::raw('(count(jobs.user_id) * avg(user_ratings.rating)), *'))
                ->leftJoin('jobs', 'service_provider_profiles.user_id', '=', 'jobs.user_id')
                ->leftJoin('user_ratings', 'service_provider_profiles.user_id', '=', 'user_ratings.user_id')
                ->orWhere('jobs.status', '=', 'completed')->orderByRaw('(count(jobs.user_id) * avg(user_ratings.rating)) DESC');
                //DB::raw('count(*) as user_count, status')
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
