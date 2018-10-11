<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Job;
use App\Data\Models\Role;
use App\Data\Models\User;
use App\Data\Models\JobBid;
use Carbon\Carbon;
use Storage;

class JobRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Job Class.
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
     * Example: Job-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'job';
    protected $_cacheTotalKey = 'total-job';

    public function __construct(Job $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findByAll($pagination = false, $perPage = 10, array $input = [] )
    {

        $this->builder = $this->model->join('users', 'users.id', 'jobs.user_id')
        ->where('users.role_id', '=', Role::CUSTOMER)
        ->where('users.status', '=', User::ACTIVE)
        ->select('jobs.id')
        ->orderBy('jobs.id', 'desc');
        
        if(!empty($input['filter_by_me'])) {
            $input['filter_by_user'] = request()->user()->id;            
        }


        if (!empty($input['keyword'])) {

            $this->builder = $this->builder->where(
                function ($query) use ($input) {
                    $query->where('title', 'LIKE', "%{$input['keyword']}%");
                }
            );
        }

        if(!empty($input['filter_by_status'])) {

            if($input['filter_by_status'] == 'archived'){

                $this->builder->where('is_archived' , '=' ,1);            

            }else{
                $this->builder = $this->builder->where('jobs.status', '=', $input['filter_by_status'])
                ->where('is_archived' , '!=' ,1);            
                
            }


        }
        
        if(!empty($input['filter_by_service'])) {

            $ids = app('ServiceRepository')->model->where('id', $input['filter_by_service'])
            ->orWhere('parent_id', $input['filter_by_service'])
            ->pluck('id')->toArray();

            $this->builder = $this->builder->whereIn('jobs.service_id', $ids);            
        }

        if(!empty($input['filter_by_user'])) {
            $this->builder = $this->builder->where('jobs.user_id', '=', $input['filter_by_user']);            
        }

        if(!empty($input['filter_by_service_provider'])) {

            $this->builder = $this->builder->leftJoin(
                'job_bids', function ($join) use ($input) {
                    $join->on('jobs.id', '=', 'job_bids.job_id');
                }
            )->where(
                [
                    [ 'job_bids.user_id', $input['filter_by_service_provider']],
                    [ 'job_bids.is_awarded', 1]
                ]
            )->select('jobs.*');
        }

        if(!empty($input['filter_by_city'])) {
            $this->builder = $this->builder->where('jobs.city_id', '=', $input['filter_by_city']);            
        }

        $data = parent::findByAll($pagination, $perPage, $input);

        return $data;   
    }



    public function findById($id, $refresh = false, $details = false, $encode = true)
    {

        $data = parent::findById($id, $refresh, $details, $encode);
        
        if($data) {

            $currentUser = request()->user();

            $details = ['user_rating' => true];
            $data->user = app('UserRepository')->findById($data->user_id, false, $details);
            
            if(empty($details['job_details'])) {

                $data->jobImages = [];
                $data->jobThumbImages = [];
                if(!empty($data->images)){
                    foreach ($data->images as $key => $image) {
                        if(is_string($image)){   
                            $data->jobImages[] = Storage::url(config('uploads.job.folder').'/'.$image);
                            $data->jobThumbImages[] = Storage::url(config('uploads.job.thumb.folder').'/'.$image);
                        }
                    }
                }
                
                if(empty($data->images)){
                    $data->images[0] = '';
                }

                $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
                $data->service = app('ServiceRepository')->findById($data->service_id);

                if($data->schedule_at && $data->preference == 'choose_date') {
                    $data->formatted_schedule_at = Carbon::parse($data->schedule_at)->format('F j, Y');
                }

                // Copied from user
                $country = app('CountryRepository')->findById($data->country_id);             
                $data->country = !empty($country->name) ? $country->name : '';
                $City = app('CityRepository')->findById($data->city_id);                
                $data->city = !empty($City->name)?$City->name:'';
                $state = app('StateRepository')->findById($data->state_id);                
                $data->state = !empty($state->name)?$state->name:'';
                $bidsCriteria = ['job_id' => $data->id];
                $bidsWhereIn = ['status' => ['pending' , 'completed', 'invited', 'visit_allowed']];
                $data->bids_count = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false, false, $bidsWhereIn, true);
                $bidsCriteria['is_awarded'] = 1;
                $awardedBid = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false);

                if($awardedBid) {
                    $data->awardedBid = $awardedBid;
                    $details = ['profile_data' => true];
                    $data->awarded_to = app('UserRepository')->findById($awardedBid->user_id, false, $details);
                }

                $ratingCriteria = ['rated_by' => $data->user_id,'status'=>'approved','job_id'=>$data->id];
                
                $data->job_rating = app('UserRatingRepository')->getAvgRatingCriteria($ratingCriteria, false);


                if ($data->status == 'awarded' || $data->status == 'initiated' || $data->status == 'completed') {

                    $bidsCriteria = ['job_bids.job_id' => $data->id,'job_bids.is_awarded'=>1];
                    $jobAmount = app('JobBidRepository')->getAwardedJobAmount($bidsCriteria);
                    $data->job_amount = $jobAmount;

                    $bidsCriteria = ['job_bids.job_id' => $data->id,'job_bids.is_awarded'=>1];
                    $servicerProvider = app('JobBidRepository')->getJobServiceProvider($bidsCriteria);
                    $data->service_provider = (!empty($servicerProvider['first_name']) && !empty($servicerProvider['last_name'])) ? 
                    $servicerProvider['first_name'] .' '.$servicerProvider['last_name'] : '-';
                    
                    if($data->status == 'completed') {

                        $criteria = ['job_id' => $data->id];

                        $criteria['rated_by'] = $data->user_id; 

                        $data->review_details = app('UserRatingRepository')->findByCriteria($criteria);


                    }


                }
                
                // current service provider bid 
                if($currentUser){

                    if($currentUser->role_id == Role::SERVICE_PROVIDER){
                        $criteria = ['user_id' => $currentUser->id, 'job_id' => $data->id];
                        $notCriteria = ['status' => 'invited'];

                        $data->my_bid = app('JobBidRepository')->findByCriteria($criteria, false, $notCriteria);

                        $criteria['user_id'] = $data->user_id; 
                        $criteria['rated_by'] = $currentUser->id; 

                        $data->service_provider_review = app('UserRatingRepository')->findByCriteria($criteria);
                        
                    }

                    $criteria = ['sender_id' => $data->user_id, 'job_id' => $data->id , 'reciever_id' => $currentUser->id,];
                    $data->can_message = app('JobMessageRepository')->findByCriteria($criteria);
                }
                
            }

        }

        return $data;
    }


    public function getTotalCountByCriteria($criteria = [], $startDate = null, $endDate = null , $orCrtieria = [])
    {
        $this->builder = $this->model->newInstance();

        if($criteria) {

            $this->builder = $this->builder->where($criteria);
        }

        // or Criteria must be an array 
        if($criteria && $orCrtieria) {
            foreach ($orCrtieria as $key => $where) {
                $this->builder  = $this->builder->orWhere(function ($query) use ($where) {
                    $query->where($where);
                });
            }
        }


        if($startDate && $endDate) {
            $this->builder = $this->builder->whereBetween('created_at', [$startDate, $endDate]);
        }

        return  $this->builder->count();
    }

    public function update(array $data = []) 
    {
        $model = $this->model->find($data['id']);
        if ($model != NULL) {
            foreach ($data as $column => $value) {

                if($data[$column]){
                    $model->{$column} = $value;
                }

            }
            $model->updated_at = Carbon::now();

            if ($model->save()) {
                if(isset($data['status']) && $data['status'] == "cancelled") {
                    $jobBids = JobBid::where('job_id', '=', $data['id'])->pluck('id')->toArray();
                    foreach ($jobBids as $key => $value) {
                        $tempData = [];
                        $tempData['id'] = $value;
                        $tempData['job_id'] = $data['id'];
                        $tempData['status'] = $data['status'];
                        $tempData['updateJob'] = false;
                        $response = app('JobBidRepository')->update($tempData);
                        if(!$response) {
                            return false;
                        }
                    }
                }
                return $this->findById($data['id'], true);
            }
            return false;
        }
        return NULL;
    }

}
