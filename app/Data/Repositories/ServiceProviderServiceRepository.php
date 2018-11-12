<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderService;
use Illuminate\Support\Facades\Cache;

class ServiceProviderServiceRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of ServiceProviderService Class.
     *
     * @var    object
     * @access public
     **/
    public $model;
    
    const   PER_PAGE = 25;

    /**
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: ServiceProviderService-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'service-provider-service';
    protected $_cacheTotalKey = 'total-service-provider-service';

    public function __construct(ServiceProviderService $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findCollectionByCriteria($criteria , $whereInModelIds = false, $details = [])
    {
        $this->builder = $this->model->withTrashed()->where($criteria);

        if(is_array($whereInModelIds)) {
            $this->builder = $this->builder->whereIn('id', $whereInModelIds);
        }

        $details = $details ? ['details' => true] : fasle;

        return $this->findByAll(false, self::PER_PAGE, $details);
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {

        $data = $this->cache()->get($this->_cacheKey.$id);

        if ($data == NULL || $refresh == true) {

            if(request()->has('with-trashed')){
                $query = $this->model->withTrashed()->find($id);
            }else{
                $query = $this->model->find($id);
            }

            if ($query != NULL) {

                $data = new \stdClass;
                foreach ($query->getAttributes() as $column => $value) {
                    $data->{$column} = $query->{$column};
                }
                $this->cache()->forever($this->_cacheKey.$id, $data);
            } else {
                return null;
            }
        }

        if($data && $details) {

            $data->service = app('ServiceRepository')->findById($data->service_id);
            
        }

        return $data;
    }

    public function getTotalCountByCriteria($crtieria = [], $startDate = null, $endDate = null)
    {

        if($crtieria) {
            $count = $this->model->where($crtieria);
        }

        if($startDate && $endDate) {
            $count = $this->model->whereBetween('created_at', [$startDate, $endDate]);
        }

        return  $count->count();
    }

    public function getTotalCountByZip($crtieria = [], $startDate = null, $endDate = null)
    {

        if($crtieria) {
            $count = $this->model->where($crtieria);
        }

        if($startDate && $endDate) {
            $count = $this->model->whereBetween('created_at', [$startDate, $endDate]);
        }

        return  $count->count();
    }

    public function bulkDeleteByCriteria($criteria)
    {
        $this->builder->where($criteria);
        $result = $this->findByAll(false);

        $this->builder->where($criteria)->delete();

        // clearing the deleted data from cache

        foreach ($result['data'] as $key => $value) {
            $this->findById($value->id, true);
        }

        return true;

    }

}
