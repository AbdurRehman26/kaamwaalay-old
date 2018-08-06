<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\SupportQuestionType;

class SupportQuestionTypeRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of SupportQuestionType Class.
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
     * Example: SupportQuestionType-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'SupportQuestionType';
    protected $_cacheTotalKey = 'total-SupportQuestionType';

    public function __construct(SupportQuestionType $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
