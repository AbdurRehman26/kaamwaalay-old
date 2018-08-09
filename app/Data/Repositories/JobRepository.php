<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Job;
use Carbon\Carbon;

class JobRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Job Class.
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
     * Example: Job-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Job';
    protected $_cacheTotalKey = 'total-Job';

    public function __construct(Job $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function create(array $data = []) {
        $data = parent::create($data);
        return $data;
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        
        if($data){  
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $data->service = app('ServiceRepository')->findById($data->service_id);

            $bidsCriteria = ['job_id' => $data->id];
            $bidsWhereIn = ['status' => ['pending' , 'completed', 'invited']];

            $data->bids_count = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false, $bidsWhereIn);

            $bidsCriteria['is_awarded'] = 1;
            $awardedBid = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false);

            if($awardedBid){
                $data->awarded_to = app('UserRepository')->findById($awardedBid->user_id);
            }
        }

        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {

        $this->builder = $this->model->orderBy('id' , 'desc');
        
        if (!empty($data['keyword'])) {

            $this->builder = $this->builder->where(function($query)use($data){
                $query->where('title', 'LIKE', "%{$data['keyword']}%");
            });
        }


        if(!empty($input['filter_by_status'])){
            $this->builder = $this->builder->where('status', '=', $input['filter_by_status']);            
        }

        if(!empty($input['filter_by_service'])){
            if($input['filter_by_service'])
                $this->builder = $this->builder->where('service_id', '=', $input['filter_by_service']);            
        }


        $data = parent::findByAll($pagination, $perPage, $input);

        return $data;   
    }


}
