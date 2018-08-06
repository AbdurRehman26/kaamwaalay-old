<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobMessage;

class JobMessageRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of JobMessage Class.
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
     * Example: JobMessage-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'JobMessage';
    protected $_cacheTotalKey = 'total-JobMessage';

    public function __construct(JobMessage $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
