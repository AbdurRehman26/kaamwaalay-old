<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfile;

class ServiceProviderProfileRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of ServiceProviderProfile Class.
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
     * Example: ServiceProviderProfile-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'ServiceProviderProfile';
    protected $_cacheTotalKey = 'total-ServiceProviderProfile';

    public function __construct(ServiceProviderProfile $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }


        /**
     *
     * This method will fetch single model by attribute
     * and will return output back to client as json
     *
     * @access public
     * @return mixed
     *
     * @author Usaama Effendi <usaamaeffendi@gmail.com>
     *
     **/
        public function findByCrtieria($crtieria, $refresh = false, $details = false, $encode = true, $whereIn = false) {
            $model = $this->model->newInstance()
            ->where($crtieria);
            if($whereIn){
                $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)])->first(['id']);
            }

            if ($model != NULL) {
                $model = $this->findById($model->id, $refresh, $details, $encode);
            }
            return $model;
        }
    }
