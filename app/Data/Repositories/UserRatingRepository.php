<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserRating;

class UserRatingRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of UserRating Class.
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
     * Example: UserRating-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'UserRating';
    protected $_cacheTotalKey = 'total-UserRating';

    public function __construct(UserRating $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
