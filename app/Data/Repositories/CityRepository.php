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

    protected $_cacheKey = 'City';
    protected $_cacheTotalKey = 'total-City';

    public function __construct(City $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $this->builder = $this->model
            ->where('state_id', '=', $data['state_id'])
            ->orderBy('name', 'ASC');
   
        return  parent::findByAll($pagination, $perPage);
    
    }
}
