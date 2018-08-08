<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobBid;
use App\Data\Models\Job;

class JobBidRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of JobBid Class.
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
     * Example: JobBid-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'JobBid';
    protected $_cacheTotalKey = 'total-JobBid';

    public function __construct(JobBid $model)
    {
        $this->model = $model;
        $this->builder = $model;

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
        public function findByCrtieria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false) {
            $model = $this->model->newInstance()
            ->where($crtieria);
            if($whereIn){
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)])->first(['id']);
            }

            if ($model != NULL) {
                $model = $this->findById($model->id, $refresh, $details, $encode);
            }
            return $model;
        }


        public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {

            $this->builder = $this->model->orderBy('id' , 'desc');

            if(!empty($input['filter_by'])){
                $this->builder = $this->builder->where('status', '=', $input['filter_by']);            
            }

            $data = parent::findByAll($pagination, $perPage, $input);

            return $data;

        }


        public function findById($id, $refresh = false, $details = false, $encode = true)
        {
            $data = parent::findById($id, $refresh, $details, $encode);
            
            if($data){
                $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
                $data->job = app('JobRepository')->findById($data->job_id);
                $ratingCriteria = ['user_id' => $data->user_id, 'job_id' => $data->id];
                $data->job_rating = app('UserRatingRepository')->findByCrtieria($ratingCriteria);
            }

            return $data;
        }

        public function getCountByCriteria($crtieria, $whereIn = false) {
            
            $model = $this->model->where($crtieria);
            if($whereIn){
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)])->count();
            }

            if ($model != NULL) {
                $model = $model->count();
                return $model;
            }
            return false;
        }

        public function getUrgentJobsCompleted($crtieria) {
            
            $model = $this->model->where($crtieria);
            if ($model != NULL) {
                
                $model = $model->pluck('job_id')->toArray();
                $model = Job::whereIn('id',$model)->where('job_type','=','urgent')->count();
                
                return $model;
            }
            return false;
        }
        


    }
