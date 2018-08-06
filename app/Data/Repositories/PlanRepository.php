<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Plan;

class PlanRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Plan Class.
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
     * Example: Plan-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Plan';
    protected $_cacheTotalKey = 'total-Plan';

    public function __construct(Plan $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
