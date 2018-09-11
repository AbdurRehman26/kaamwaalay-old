<?php

namespace App\Data\Repositories;
use App\Data\Models\Role;
use Carbon\Carbon;
use DB;
use \StdClass;
use App\Helper\Helper;

class DashboardRepository
{
    /**
     * These will hold the instance of Dashboard Class.
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
     * Example: Dashboard-1
     *
     * @var    string
     * @access protected
     **/

    public function __construct()
    {
        $this->userRepo         = app('UserRepository');
        $this->jobRepo          = app('JobRepository');
        $this->paymentRepo      = app('PaymentRepository');
        $this->jobBidRepo       = app('JobBidRepository');
    }

    public function stats($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');
        $data           = [];

        $criteria = ['role_id' => Role::CUSTOMER];
        $data['total_customer_signup'] = $this->userRepo->getTotalCountByCriteria($criteria, $startDate, $endDate);

        $criteria = ['role_id' => Role::SERVICE_PROVIDER];
        $data['total_service_provider_signup'] = $this->userRepo->getTotalCountByCriteria($criteria, $startDate, $endDate);

        $criteria = ['status' => $this->jobRepo->model::INITIATED];
        $data['total_job_initiated'] = $this->jobRepo->getTotalCountByCriteria($criteria, $startDate, $endDate);

        $criteria = [];
        $aggregate = 'sum';
        $field = 'amount';
        $data['total_payment_collected'] = $this->paymentRepo->getTotalByCriteria($criteria, $aggregate, $field, $startDate, $endDate);

        return $data;
    }

    public function signUpsOverTime($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');
        $data['data']   = [];

        $roleId = Role::CUSTOMER;
        if($input['type'] == 'service_provider_signup') {
            $roleId = Role::SERVICE_PROVIDER;
        }

        $result = $this->userRepo->model
            ->select(
                DB::raw('COUNT(id) as value'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date')
            )
            ->where('role_id', '=', $roleId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get()
            ->toArray();

        
        
        if(!empty($result)) {

            $totalValues  = Helper::getDateRange($startDate, $endDate, 'P1D', 'Y-m-d');
            $records = collect($result);
            $dates = $records->pluck('date')->toArray();

            foreach ($totalValues as $value) {
                if (!in_array($value, $dates)) {
                    $emptyData = [];
                    $emptyData['value'] = 0 ;
                    $emptyData['date'] = $value ;

                    $result[] = $emptyData;
                }
            }

            usort(
                $result, function ($a, $b) {
                    return  strtotime($a['date']) -  strtotime($b['date']);
                }
            );
        }

        return $result;
    }

    public function jobServiceType($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');


        $result = $this->jobRepo->model
            ->leftJoin(
                'services', function ($joins) {
                    $joins->on('services.id', '=', 'jobs.service_id');
                }
            )
        ->select(
            'services.title as title',
            DB::raw('COUNT(jobs.id) as value')
        )
        ->whereBetween('jobs.created_at', [$startDate, $endDate])
        ->groupBy('services.id')
        ->limit(10)
        ->orderBy('services.title', 'ASC')
        ->get()
        ->toArray();

        return $result;
    }

    public function PrOverTime($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');
        $data['data']   = [];


        $result = $this->paymentRepo->model
            ->select(
                DB::raw('SUM(amount) as value'),
                DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->get()
            ->toArray();

        
        
        if(!empty($result)) {

            $totalValues  = Helper::getDateRange($startDate, $endDate, 'P1D', 'Y-m-d');
            $records = collect($result);
            $dates = $records->pluck('date')->toArray();

            foreach ($totalValues as $value) {
                if (!in_array($value, $dates)) {
                    $emptyData = [];
                    $emptyData['value'] = 0 ;
                    $emptyData['date'] = $value ;

                    $result[] = $emptyData;
                }
            }

            usort(
                $result, function ($a, $b) {
                    return  strtotime($a['date']) -  strtotime($b['date']);
                }
            );
        }

        return $result;
    }

    public function PrType($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');


        $result = $this->paymentRepo->model
            ->select(
                'type',
                DB::raw('SUM(amount) as value')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('type')
            ->get()
            ->toArray();

        return $result;
    }


    public function topServiceProvider($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');

        $result = $this->userRepo->model
            ->leftJoin(
                'user_ratings', function ($joins) {
                    $joins->on('user_ratings.user_id', '=', 'users.id');
                }
            )
        ->leftJoin(
            'job_bids', function ($joins) {
                $joins->on('job_bids.user_id', '=', 'users.id')
                    ->where('job_bids.status', '=', $this->jobBidRepo->model::COMPLETED);
            }
        )
        ->leftJoin(
            'service_provider_profiles', function ($joins) {
                $joins->on('service_provider_profiles.user_id', '=', 'users.id');
            }
        )
        ->whereBetween('users.created_at', [$startDate, $endDate])
        ->where('role_id', '=', Role::SERVICE_PROVIDER)
        ->select(
            'users.id as user_id',
            'users.email as email',
            DB::raw('CONCAT(users.first_name," ",users.last_name) AS "full_name" '),
            DB::raw('AVG(rating) as rating'),
            DB::raw('COUNT(DISTINCT job_bids.id) as job_completed'),
            'duns_number',
            'business_type'
        )
        ->groupBy('users.id')
        ->limit(5);
        if(!empty($input['filter'])){
            if($input['filter'] == 'by_rating'){
                $result = $result->orderBy('rating', 'DESC');
            }else{
                $result = $result->orderBy('job_completed', 'DESC');    
            }
        }else{
            $result = $result->orderBy('job_completed', 'DESC')
            ->orderBy('rating', 'DESC');    
        }
        
        $result = $result->get()
        ->toArray();

        return $result;
    }

    public function topCustomer($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');
        $data = [];

        $result = $this->userRepo->model
            ->leftJoin(
                'user_ratings', function ($joins) {
                    $joins->on('user_ratings.user_id', '=', 'users.id');
                }
            )
        ->leftJoin(
            'jobs', function ($joins) {
                $joins->on('jobs.user_id', '=', 'users.id')
                    ->where('jobs.status', '=', $this->jobRepo->model::COMPLETED);
            }
        )
        ->whereBetween('users.created_at', [$startDate, $endDate])
        ->where('role_id', '=', Role::CUSTOMER)
        ->select(
            'users.id as user_id',
            'users.email as email',
            DB::raw('CONCAT(users.first_name," ",users.last_name) AS "full_name" '),
            DB::raw('AVG(rating) as rating'),
            DB::raw('COUNT(jobs.id) as job_completed')
        )
        ->groupBy('users.id')
        ->limit(5);
         if(!empty($input['filter'])){
            if($input['filter'] == 'by_rating'){
                $result = $result->orderBy('rating', 'DESC');
            }else{
                $result = $result->orderBy('job_completed', 'DESC');    
            }
        }else{
            $result = $result->orderBy('job_completed', 'DESC')
            ->orderBy('rating', 'DESC');    
        }
        $result = $result->get()
        ->toArray();

        return $result;
    }



}
