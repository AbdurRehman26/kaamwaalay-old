<?php

namespace App\Services;

use App\Models\UserAgent;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;

class UserAgentRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of UserAgent Class.
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
     * Example: UserAgent-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'user-agent';
    protected $_cacheTotalKey = 'total-user-agent';

    public function __construct(UserAgent $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
