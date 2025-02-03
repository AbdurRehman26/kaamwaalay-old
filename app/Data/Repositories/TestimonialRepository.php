<?php

namespace App\Data\Repositories;

use App\Models\Testimonial;
use Carbon\Carbon;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class TestimonialRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Testimonial Class.
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
     * Example: Testimonial-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'testimonial';
    protected $_cacheTotalKey = 'total-testimonial';

    public function __construct(Testimonial $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
    public function findByAll($pagination = false, $perPage = 10, array $input = [] )
    {

        $this->builder = $this->model->orderBy('testimonials.updated_at', 'desc');
        if(isset($input['filter_by_role'])) {
            $this->builder = $this->builder->leftJoin('users', 'testimonials.user_id', 'users.id')
            ->where('users.role_id', '=', (int)$input['filter_by_role']);
        }
        if(isset($input['filter_by_type'])) {
            $this->builder = $this->builder->where('type', '=', $input['filter_by_type']);
        }
        if(isset($input['filter_by_count'])) {
            $this->builder = $this->builder->take((int)$input['filter_by_count']);
        }            

        $this->builder = $this->builder->select('testimonials.id');

        $data = parent::findByAll($pagination, $perPage, $input);

        return $data;

    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        $data->user = app('UserRepository')->findById($data->user_id);

        if($data) {
            $data->formatted_created_at = Carbon::parse($data->created_at)->diffForHumans();
        }

        return $data;
    }
}
