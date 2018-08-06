<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\JobBid;

class JobBidRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of JobBid Class.
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
     * Example: JobBid-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'JobBid';
    protected $_cacheTotalKey = 'total-JobBid';

    public function __construct(JobBid $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
