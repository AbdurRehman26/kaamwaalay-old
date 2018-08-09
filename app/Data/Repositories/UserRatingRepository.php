<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserRating;

class UserRatingRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of UserRating Class.
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
     * Example: UserRating-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'UserRating';
    protected $_cacheTotalKey = 'total-UserRating';

    public function __construct(UserRating $model)
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
        public function findByCriteria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false) {
            $model = $this->model->newInstance()
            ->where($crtieria);

            if($count){
                return $model->count();
            }

            if($whereIn){
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
            }

            $model = $model->first(['id']);
            
            if ($model != NULL) {
                $model = $this->findById($model->id, $refresh, $details, $encode);
            }
            return $model;
        }

    public function getAvgRatingCriteria($crtieria, $whereIn = false) {
            
            $model = $this->model->where($crtieria);
            if($whereIn){
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)])->avg('rating');
            }

            if ($model != NULL) {
                $model = $model->avg('rating');
                return $model;
            }
            return false;
    }
}
