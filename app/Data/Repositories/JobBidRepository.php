<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobBid;
use App\Data\Models\Job;
use Carbon\Carbon;

class JobBidRepository extends AbstractRepository implements RepositoryContract
{
/**
* These will hold the instance of JobBid Class.
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
* Example: JobBid-1
*
* @var    string
* @access protected
**/

protected $_cacheKey = 'job-bid';
protected $_cacheTotalKey = 'total-job-bid';

public function __construct(JobBid $model)
{
    $this->model = $model;
    $this->builder = $model;

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
public function findByCriteria($criteria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false)
{

    $model = $this->model->newInstance()
    ->where($criteria);

    if($whereIn) {
        $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);

    }

    if($count) {
        return $model->count();
    }

    $model = $model->first(['id']);

    if ($model != null) {
        $model = $this->findById($model->id, $refresh, $details, $encode);
    }
    return $model;
}


public function findByAll($pagination = false, $perPage = 10, array $input = [] )
{
    $this->builder = $this->model->orderBy('is_awarded' , 'desc');
    if(!empty($input['filter_by_job_detail'])) {
        $this->builder = $this->model;
    }
    if(!empty($input['filter_by_status'])) {

        if($input['filter_by_status'] == 'awarded') {

            $this->builder = $this->builder->where('is_awarded', '=', 1);            

        }elseif($input['filter_by_status'] == 'invited') {

            $this->builder = $this->builder->where('is_invited', '=', 1);            

        }elseif($input['filter_by_status'] == 'archived') {

            $this->builder = $this->builder->where('is_archived', '=', 1);            

        }else{
            $this->builder = $this->builder->where('status', '=', $input['filter_by_status']);            
        }

    }

    if(!empty($input['filter_by_job_id'])) {
        $this->builder = $this->builder->where('job_id', '=', $input['filter_by_job_id']);            
    }  
    if(isset($input['filter_by_tbd'])) {
        $this->builder = $this->builder->where('is_tbd', '=', (int)$input['filter_by_tbd']);            
    }             
    if(!empty($input['filter_by_invitation'])) {
        $this->builder = $this->builder->where('is_invited', '=', $input['filter_by_invitation']);            

    }   
    if(!empty($input['filter_by_archived']) || isset($input['filter_by_archived'])) {
        $this->builder = $this->builder->where('is_archived', '=', $input['filter_by_archived']);            
    }                  
    if(!empty($input['filter_by_awarded']) || isset($input['filter_by_awarded'])) {
        $this->builder = $this->builder->where('is_awarded', '=', $input['filter_by_awarded']);            
    }                 
    if(!empty($input['is_status'])) {
        $this->builder = $this->builder->where('status', '=', $input['is_status']);            
    }               
    if(!empty($input['filter_by_active_bids'])) {

        $this->builder = $this->builder->where(
            function ($query) {
                $query->where('status', '=', 'pending');
                $query->orWhere('status', '=', 'on_the_way');
                $query->orWhere('status', '=', 'visit_allowed');
            }
        );
    }            
    if(!empty($input['filter_by_awarded_status'])) {

        $this->builder = $this->builder->where(
            function ($query) {
                $query->where('status', '=', 'pending');
                $query->orWhere('status', '=', 'initiated');
            }
        );
    }            
    if(!empty($input['filter_by_job_detail'])) {
        $this->builder = $this->builder->where('user_id', '=', $input['user_id'])
        ->orderBy('job_bids.updated_at', 'desc');
        $input['details'] = $input['filter_by_job_detail'];
    }

    $data = parent::findByAll($pagination, $perPage, $input);

    if(!empty($input['count_only'])) {
        $data['data'] = sizeof($data['data']);
    }
    return $data;

}


public function findById($id, $refresh = false, $details = false, $encode = true)
{
    $data = parent::findById($id, $refresh, $details, $encode);
    $job_details = $details;
    $details = ['user_rating' => true];


    if($data) {
        $data->user = app('UserRepository')->findById($data->user_id, false, $details);
        $data->service_provider = app('ServiceProviderProfileRepository')->findByAttribute('user_id', $data->user_id);

        $data->formatted_amount = '$'. number_format($data->amount, 2);

        $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');

        if($job_details) {
            $data->job = app('JobRepository')->findById($data->job_id, false, ['job_details' => true]);

        }

        $ratingCriteria = ['user_id' => $data->user_id, 'job_id' => $data->id];
        $data->job_rating = app('UserRatingRepository')->findByCriteria($ratingCriteria);

    }

    return $data;
}


public function getCountByCriteria($criteria, $whereIn = false)
{

    $model = $this->model->where($criteria);

    if($whereIn) {
        $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)])->count();
    }

    if ($model != null) {
        $model = $model->count();
        return $model;
    }
    return false;
}


public function getUrgentJobsCompleted($criteria)
{

    $model = $this->model->where($criteria);

    if ($model != null) {

        $model = $model->
        leftJoin(
            'jobs', function ($join) {
                $join->on('jobs.id', '=', 'job_bids.job_id');
            }
        )
        ->where('jobs.job_type', '=', 'urgent')
        ->where('jobs.status', '=', 'completed')
        ->count();


        return $model;
    }
    return false;
}


public function getUrgentJobsCreated($criteria)
{

    $model = $this->model->where($criteria);

    if ($model != null) {

        $model = $model->
        leftJoin(
            'jobs', function ($join) {
                $join->on('jobs.id', '=', 'job_bids.job_id');
            }
        )
        ->where('jobs.job_type', '=', 'urgent')
        ->where('jobs.status', '!=', 'completed')
        ->count();


        return $model;
    }
    return false;
}

public function getTotalRevenueCriteria($criteria)
{

    $model = $this->model->where($criteria);

    if ($model != null) {
        $model = $model->
        leftJoin(
            'jobs', function ($join) {
                $join->on('jobs.id', '=', 'job_bids.job_id');
            }
        )
        ->where('jobs.status', 'completed')
        ->select(\DB::raw('AVG(job_bids.amount) as total_revenue'))->pluck('total_revenue')->toArray()[0];

        return $model;
    }
    return false;
}


public function getCompletedJobs($criteria)
{

    $model = $this->model->where($criteria);

    if ($model != null) {
        $model = $model->
        leftJoin(
            'jobs', function ($join) {
                $join->on('jobs.id', '=', 'job_bids.job_id');
            }
        )
        ->where('jobs.status', '=', 'completed')
        ->count();

        return $model;
    }
    return false;
}


public function getAwardedJobAmount($criteria)
{

    $model = $this->model->where($criteria);
    if ($model != null) {
        $model = $model->value('amount');

        return $model;
    }
    return false;
}

public function getJobServiceProvider($criteria)
{

    $model = $this->model->where($criteria);
    if ($model != null) {
        $model = $model->leftJoin(
            'users', function ($join) {
                $join->on('users.id', '=', 'job_bids.user_id');
            }
        )                    
        ->select('first_name', 'last_name')->first();

        return $model;
    }
    return false;
}

public function update(array $data = [])
{
    unset($data['user_id']);
    $updateJob = isset($data['updateJob']) ? $data['updateJob'] : true;
    unset($data['updateJob']);
    $status = !empty($data['status']) ? $data['status'] : null;
    $status = !empty($data['is_awarded']) ? 'awarded' : $status;
    $status = !empty($data['is_archived']) ? 'is_archived' : $status;

    if($data && !empty($status)){
        $updateData = ['id' => $data['job_id']];
        if($status == 'initiated'){

            $data['is_archived'] = 0;
            $updateData['status'] = 'initiated';
        }

        if($status == 'awarded'){

            $data['is_archived'] = 0;
            $updateData['status'] = 'awarded';

        }
        if($status == 'cancelled'){

            $data['is_archived'] = 0;

        }

        $data = parent::update($data);
        $criteria = ['job_id' => $data->job_id, 'is_visit_required' => 1];

        if($status == 'awarded'){

            if (!\App::runningInConsole()) {
                $this->model->where($criteria)->delete();
            }        
        }

    }

    
    if(!empty($updateData) && $updateJob){  
        app('JobRepository')->update($updateData);
    }

    return $data;
}


public function create(array $data = [])
{
    $data['status'] = 'pending';
    $data['deleted_at'] = null;
    $data['is_archived'] = 0;
    $data['is_visit_required'] = 0;

    $data['updated_at'] = Carbon::now()->ToDateTimeString();

    $criteria = ['user_id' => $data['user_id'] , 'job_id' => $data['job_id']];


    $this->model->insertOnDuplicateKey($data);

    $this->findByCriteria($criteria, true);

    return $data;
}

}

