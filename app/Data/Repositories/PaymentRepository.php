<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Payment;
use App\Data\Models\User;
use Carbon\Carbon;
use DB;

class PaymentRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Payment Class.
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
     * Example: Payment-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'payment';
    protected $_cacheTotalKey = 'total-payment';

    public function __construct(Payment $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->userRepo = app('UserRepository');

    }

    public function getTotalByCriteria($crtieria = [], $aggregate = 'count', $field = 'amount', $startDate = null, $endDate = null)
    {
        
        $record = $this->model;

        if($crtieria) {
            $record = $record->where($crtieria);
        }

        if($startDate && $endDate) {
            $record = $record->whereBetween('created_at', [$startDate, $endDate]);
        }

        if($aggregate && $aggregate == 'sum') {
            $record = $record->sum($field);   
        }else{
            $record = $record->count();
        }

        return  $record;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $this->builder = $this->builder
            ->leftJoin('users', 'payments.pay_by', '=', 'users.id');

        if(!empty($data['filter_by_pay_by'])) {
            $this->builder = $this->builder->where('users.role_id', '=', $data['filter_by_pay_by']);
            ;
        }

        if(!empty($data['filter_by_type'])) {
            $this->builder = $this->builder->where('payments.type', '=', $data['filter_by_type']);
            ;
        }

        if(!empty($data['keyword'])) {
            $this->builder = $this->builder
                ->where(
                    function ($query) use ($data) {
                        $query->orWhere(DB::raw('CONCAT(users.first_name," ",users.last_name)'), 'LIKE', '%'.$data['keyword'].'%');
                    }
                );            
        }

        $this->builder = $this->builder
            ->select('payments.id')
            ->orderBy('payments.created_at', 'DESC');

        return  parent::findByAll($pagination, $perPage);
    
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        if($data) {
            $details = ['role' => true];
            $data->full_name = '';
            $data->pay_by = $this->userRepo->findById($data->pay_by, false, $details);
            if($data->pay_by) {
                $data->full_name = $data->pay_by->first_name. ' ' .$data->pay_by->last_name;
            }
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $data->type = ucfirst($data->type);
        }

        return $data;
    }

    public function create(array $data = [])
    {
        $user = User::find($data['user_id']);
        $stripeToken = $data['stripe_token'];
        //return  $user->charge(100);
         try{
              $user->newSubscription('main', 'plan_DXg2Sso3f23PVP')->create($stripeToken);
              return 'success';
          } catch (\Stripe\Error\InvalidRequest $e) {
              return $e->getMessage();
          }

        /*unset($data['user_id']);
        if (!empty($data['parent_id'])) {

            $parentExist = Service::where('id', '=', $data['parent_id'])->whereNull('parent_id')->count();

            if ($parentExist) {
                return parent::create($data);
            }else{
                return 'not_parent';
            }
        }else{
            return parent::create($data);
        }*/
    }
}
