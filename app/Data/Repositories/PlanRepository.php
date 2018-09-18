<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Plan;
use Carbon\Carbon;

class PlanRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Plan Class.
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
     * Example: Plan-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'plan';
    protected $_cacheTotalKey = 'total-plan';
    protected $_url;
    protected $_secretKey;
    protected $_currency;

    public function __construct(Plan $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->_url = config('services.stripe.url');
        $this->_secretKey = config('services.stripe.secret');
        $this->_currency = config('services.stripe.currency');

    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {
        $this->builder = $this->builder;
        if(!empty($data['type'])){
        $this->builder =   $this->builder->where('type', '=', $data['type']);
        }
        if(!empty($data['product'])){
        $this->builder =   $this->builder->where('product', '=', $data['product']);
        }
         $this->builder=  $this->builder->orderBy('amount', 'ASC'); 
        return  parent::findByAll($pagination, $perPage);
    
    }

    public function updateOrAddPlans($input)
    {
        $data = [];
        $date = Carbon::now();
        $ids = [Plan::URGENT, Plan::ACCOUNT_CREATION];
        if(count($input['plans_data'])) {
            foreach ($input['plans_data'] as $key => $value) {
                
                $value['id']            =   !empty($value['id'])?$value['id']:null;
                $value['name']          =   'Featured Profile';
                $value['type']          =   'service';
                $value['amount']        =   $value['amount'];
                $value['quantity']      =   $value['quantity'];
                $value['created_at']    =   $date;
                $value['updated_at']    =   $date;
                $data[] =   $value;
                $ids[] = $value['id'];
            }

            if(count($ids)) {
                $ids = array_filter($ids);
                $this->model->whereNotIn('id', $ids)->delete();
            }

            if($this->model->insertOnDuplicateKey($data, ['amount', 'quantity', 'updated_at'])) {
                return true;
            }
        }


        return false;
    }

    public function create(array $data = [])
    {
        if(!empty($data['id']) && (($data['type'] == 'service' &&  $data['product'] == 'account_creation') || ($data['type'] == 'job' &&  $data['product'] == 'urgent_job'))){
            parent::deleteById($data['id']);
            unset($data['id']);
        }
        $record = parent::create($data);
        // for stripe cent to dollar
        $data['amount'] = (int) $data['amount']*100;
        if($record){
            try {
                $client = new \GuzzleHttp\Client;
                $client->request('POST', $this->_url.'plans', [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->_secretKey,
                    ],
                    'form_params' => [
                        'amount' =>$data['amount'],
                        'interval' =>'year',
                        'product[name]' =>$data['product'],
                        'currency' =>$this->_currency,
                        'id' =>$record->id,
                    ]
                ]);
                $response = $record;
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                parent::deleteById($record->id);
                \Log::info('stripe plan create:'.$e->getMessage());
                $response = false;
            }
        }else{
            $response  = false;
        }
        return $response;
    }


    public function deleteById($id) {
        $model = $this->model->find($id);
        if($model != NULL) {
            $this->cache()->forget($this->_cacheKey.$id);
            $this->cache()->forget($this->_cacheTotalKey);
            $response = $model->delete();
            try {
                $client = new \GuzzleHttp\Client;
                $client->delete($this->_url.'plans/'.$id, [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->_secretKey,
                    ]
                ]);
            } catch (\GuzzleHttp\Exception\ClientException $e) {
               \Log::info('stripe plan delete:'.$e->getMessage());
            }
        }else{
            $response = false;
        }
        return $response;
    }
}
