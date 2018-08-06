<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserProfile;

class UserProfileRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of UserProfile Class.
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
     * Example: UserProfile-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'UserProfile';
    protected $_cacheTotalKey = 'total-UserProfile';

    public function __construct(UserProfile $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
