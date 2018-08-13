<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Plan;

class PlanRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Plan Class.
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
     * Example: Plan-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Plan';
    protected $_cacheTotalKey = 'total-Plan';

    public function __construct(Plan $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] ) {
        $this->builder = $this->builder
                            ->where('type', '=' , $data['type'])
                            ->orderBy('amount', 'ASC')
                            ;   
        return  parent::findByAll($pagination, $perPage);
    
    }

    public function updateOrAddPlans($input)
    {
        $data = [];
        $date = Carbon::now();
        $ids = [];
        if(count($input['plans_data'])){
            foreach ($input['plans_data'] as $key => $value) {
                
                $value['id']            =   !empty($value['id'])?$value['id']:NULL;
                $value['name']          =   'Featured Profile';
                $value['type']          =   'service';
                $value['amount']        =   $value['amount'];
                $value['quantity']      =   $value['quantity'];
                $value['created_at']    =   $date;
                $value['updated_at']    =   $date;
                $data[] =   $value;
                $ids[] = $value['id'];
            }

            if(count($ids)){
                $ids = array_filter($ids);
                $this->model->where('type', '=', 'service')->whereNotIn('id', $ids)->delete();
            }

            if($this->model->insertOnDuplicateKey($data,['amount', 'quantity', 'updated_at'])){
                return true;
            }
        }


        return false;
    }
}
