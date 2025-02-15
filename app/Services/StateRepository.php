<?php

namespace App\Services;

use App\Models\Country;
use App\Models\State;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class StateRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of State Class.
     *
     * @var    object
     * @access public
     **/
    public $model;

    /**
     * This is the prefix of the cache key to which the
     * App\Services data will be stored
     * App\Services Auto incremented Id will be append to it
     *
     * Example: State-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'state';
    protected $_cacheTotalKey = 'total-state';

    public function __construct(State $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $countryId = Country::USA;
        if(!empty($data['country_id'])) {
            $countryId = $data['country_id'];
        }

        $this->builder = $this->model
            ->where('country_id', '=', $countryId)
            ->orderBy('name', 'ASC');
   
        return  parent::findByAll($pagination, $perPage);
    
    }
}
