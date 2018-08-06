<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserServiceReject;

class UserServiceRejectRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of UserServiceReject Class.
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
     * Example: UserServiceReject-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'UserServiceReject';
    protected $_cacheTotalKey = 'total-UserServiceReject';

    public function __construct(UserServiceReject $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
