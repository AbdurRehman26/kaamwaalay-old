<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobMessage;

class JobMessageRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of JobMessage Class.
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
     * Example: JobMessage-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'JobMessage';
    protected $_cacheTotalKey = 'total-JobMessage';

    public function __construct(JobMessage $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function create(array $data = []){
        $input = $data;

        $job = app('JobRepository')->findById($data['job_id']);

        $input['reciever_id'] = $job->user_id;

        return parent::create($input);
    }


    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {

        $this->builder = $this->model->orderBy('id' , 'desc');

        if(empty($input['job_bid_id'])){
            return false;
        }
        $this->builder = $this->builder->where('job_bid_id', '=', $input['job_bid_id']);            

        $data = parent::findByAll($pagination, $perPage, $input);

        return $data;

    }

}
