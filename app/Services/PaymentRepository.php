<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\Plan;
use Carbon\Carbon;
use DB;
use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use Laravel\Cashier\Subscription;

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
     * App\Services data will be stored
     * App\Services Auto incremented Id will be append to it
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
        
        $record = $this->model->join('plans', 'subscriptions.stripe_plan', '=', 'plans.id');

        if($crtieria) {
            $record = $record->where($crtieria);
        }

        if($startDate && $endDate) {
            $record = $record->whereBetween('subscriptions.created_at', [$startDate, $endDate]);
        }

        if($aggregate && $aggregate == 'sum') {
            $record = $record->sum('plans.'.$field);   
        }else{
            $record = $record->count();
        }

        return  $record;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $this->builder = $this->builder
            ->leftJoin('users', 'subscriptions.user_id', '=', 'users.id');

        if(!empty($data['filter_by_pay_by'])) {
            $this->builder = $this->builder->where('users.role_id', '=', $data['filter_by_pay_by']);
            ;
        }

        if(!empty($data['filter_by_type'])) {
            $this->builder = $this->builder->leftJoin('plans', 'subscriptions.stripe_plan', '=', 'plans.id');
            $this->builder = $this->builder->where('plans.product', '=', $data['filter_by_type']);
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
            ->select('subscriptions.id')
            ->orderBy('subscriptions.created_at', 'DESC');

        return  parent::findByAll($pagination, $perPage);
    
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        if($data) {
            $details = ['role' => true];
            $data->full_name = '';
            $data->pay_by = $this->userRepo->findById($data->user_id, false, $details);
            if($data->pay_by) {
                $data->full_name = $data->pay_by->first_name. ' ' .$data->pay_by->last_name;
            }
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $planData = Plan::where('id','=',$data->stripe_plan)->withTrashed()->first();
            $data->type = $planData->product;
            $data->amount = $planData->amount;
        }

        return $data;
    }

    public function create(array $data = [])
    {
        \DB::beginTransaction();
        $user = request()->user();

        try {
            if (!$user->hasStripeId()) {
                $user->createAsStripeCustomer($data['stripe_token']);
            } else {
                $user->updateCard($data['stripe_token']);
            }

            $plan = app('PlanRepository')->findById($data['plan_id']);

            $charge = $user->charge($plan->amount * 100, [
                'description' => "{$user->first_name} {$user->last_name} purchased a Featured Plan.",
                'metadata' => [
                    'Plan ID' => $plan->id,
                    'Purchased by' => "{$user->first_name} {$user->last_name}",
                ],
            ]);

            $subscription = Subscription::create([
                'user_id' => $user->id,
                'stripe_id' => $charge->id,
                'stripe_plan' => $plan->id,
            ]);

            app('CampaignRepository')->create([
                'plan_id' => $plan->id,
                'user_id' => $user->id,
            ]);

            \DB::commit();
            return $subscription;

        } catch (\Stripe\Error\InvalidRequest $e) {
            $response =  $e->getMessage();
        } catch (\Exception $e) {
            $response =  $e->getMessage();
        }
        return $response;
    }
}
