<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobBid;

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
}
