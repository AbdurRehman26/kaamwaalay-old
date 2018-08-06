<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Service;

class ServiceRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Service Class.
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
     * Example: Service-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Service';
    protected $_cacheTotalKey = 'total-Service';

    public function __construct(Service $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
