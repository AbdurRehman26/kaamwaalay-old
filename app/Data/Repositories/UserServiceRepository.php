<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserService;

class UserServiceRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of UserService Class.
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
     * Example: UserService-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'UserService';
    protected $_cacheTotalKey = 'total-UserService';

    public function __construct(UserService $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
