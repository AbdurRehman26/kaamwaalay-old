<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserRating;
use Carbon\Carbon;

class UserRatingRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of UserRating Class.
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
     * Example: UserRating-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'user-rating';
    protected $_cacheTotalKey = 'total-user-rating';

    public function __construct(UserRating $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->userRepo = app('UserRepository');

    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        $data->rated_by_name = '';
        if($data && $data->rated_by) {
            $userData = $this->userRepo->findById($data->rated_by);
            if($userData) {
                $data->rated_by_name     = $userData->first_name.' '.$userData->last_name;
            }
        }

        $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
        return $data;
    }
    
    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {
        $this->builder = $this->builder
            ->where('user_id', '=', $data['user_id'])
            ->orderBy('rating', 'DESC');      
        return  parent::findByAll($pagination, $perPage);

    }

    public function findByCriteria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false, $count = false)
    {
        $model = $this->model->newInstance()
            ->where($crtieria)->orderBy('created_at', 'DESC');

        if($count) {
            return $model->count();
        }

        if($whereIn) {
            $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
        }

        $model = $model->first(['id']);

        if ($model != null) {
            $model = $this->findById($model->id, $refresh, $details, $encode);
        }
        return $model;
    }

    public function getAvgRatingCriteria($crtieria, $whereIn = false)
    {

        $model = $this->model->where($crtieria);
        if($whereIn) {
            $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
        }

        if ($model != null) {
            $model = $model->avg('rating');
            return $model;
        }
        return false;
    }
    public function getTotalFeedbackCriteria($crtieria, $whereIn = false)
    {

        $model = $this->model->where($crtieria);
        if($whereIn) {
            $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);
        }

        if ($model != null) {
            $model = $model->count();
            return $model;
        }
        return false;
    }
}
