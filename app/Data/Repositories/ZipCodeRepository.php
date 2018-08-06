<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ZipCode;

class ZipCodeRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of ZipCode Class.
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
     * Example: ZipCode-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'ZipCode';
    protected $_cacheTotalKey = 'total-ZipCode';

    public function __construct(ZipCode $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
