<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Campaign;

class CampaignRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Campaign Class.
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
     * Example: Campaign-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Campaign';
    protected $_cacheTotalKey = 'total-Campaign';

    public function __construct(Campaign $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
