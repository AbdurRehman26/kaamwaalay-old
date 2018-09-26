<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\City;

class CityRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of City Class.
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
     * Example: City-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'city';
    protected $_cacheTotalKey = 'total-city';

    CONST AMERICA = 231;

    public function __construct(City $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findById($id, $refresh = false, $details = false, $encode = true) {
        $data = parent::findById($id);

        if ($data && $details) {
            $data->state = app('StateRepository')->findById($data->state_id);
        }

        return $data;
    }


    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $this->builder = $this->model->join('states' , 'states.id', 'cities.state_id')
        ->where('states.country_id', self::AMERICA)->orderBy('cities.name', 'ASC');

        if(!empty($data['state_id'])){
            $this->builder->where('cities.state_id', '=', $data['state_id']);
        }
        if(!empty($data['keyword'])){
            $this->builder->where('cities.name', 'LIKE', '%'.$data['keyword'].'%');
        }

        $this->builder->select(['cities.*']);

        return  parent::findByAll($pagination, $perPage, $data);

    }
}
