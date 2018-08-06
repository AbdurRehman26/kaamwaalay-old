<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Notification;

class NotificationRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Notification Class.
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
     * Example: Notification-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Notification';
    protected $_cacheTotalKey = 'total-Notification';

    public function __construct(Notification $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
