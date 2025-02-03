<?php

namespace App\Data\Repositories;

use App\Models\Country;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class CountryRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Country Class.
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
     * Example: Country-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'country';
    protected $_cacheTotalKey = 'total-country';

    public function __construct(Country $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
