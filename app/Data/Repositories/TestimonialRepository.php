<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Testimonial;

class TestimonialRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Testimonial Class.
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
     * Example: Testimonial-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'testimonial';
    protected $_cacheTotalKey = 'total-testimonial';

    public function __construct(Testimonial $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
