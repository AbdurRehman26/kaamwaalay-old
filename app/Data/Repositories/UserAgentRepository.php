<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\UserAgent;

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
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
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
