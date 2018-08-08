<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Service;

class ServiceRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Service Class.
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
     * Example: Service-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Service';
    protected $_cacheTotalKey = 'total-Service';

    public function __construct(Service $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
    public function findById($id, $refresh = false, $details = false, $encode = true, $input =  []) {
        $data = parent::findById($id, $refresh, $details, $input);

        if ($data) {
            if($data->parent_id != 0){
                $data->parent = $this->findById($data->parent_id);
                
            }else{

            $data->parent = '';
            }
        }
        
        return $data;
    }

    public function create(array $data = []) {
        unset($data['user_id']);

        return parent::create($data);
    }
    public function update(array $data = []) {
        unset($data['user_id']);

        return parent::update($data);
    }


    public function findByAll($pagination = false,$perPage = 10, $data = []){       

        $this->builder = $this->model->orderBy('created_at','desc');


        if (!empty($data['keyword'])) {
            
            $this->builder = $this->builder->where(function($query)use($data){
                $query->where('services.title', 'LIKE', "%{$data['keyword']}%");
                $query->orWhere('services.derscription', 'like', "%{$data['keyword']}%");
            
            });
        }
        if(!empty($data['filter_by_featured'])){
            $this->builder = $this->builder->where('is_featured','=',$data['filter_by_featured']);
        }
        
        return parent::findByAll($pagination, $perPage, $data);

    }

}
