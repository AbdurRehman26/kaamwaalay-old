<?php

namespace App\Data\Repositories;
use App\Data\Models\Role;
use Carbon\Carbon;
use DB;
use \StdClass;

class DashboardRepository
{
    /**
     *
     * These will hold the instance of Dashboard Class.
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
     * Example: Dashboard-1
     *
     * @var string
     * @access protected
     *
     **/

    public function __construct()
    {
        $this->userRepo         = app('UserRepository');
        $this->jobRepo          = app('JobRepository');
        $this->paymentRepo      = app('PaymentRepository');
    }

    public function stats($input)
    {   
        $startDate      = Carbon::parse($input['start_date']);
        $endDate        = Carbon::parse($input['end_date'])->modify('23:59:59');
        $data           = [];

        $criteria = ['role_id' => Role::CUSTOMER];
        $data['total_customer_signup'] = $this->userRepo->getTotalCountByCriteria($criteria);

        $criteria = ['role_id' => Role::SERVICE_PROVIDER];
        $data['total_service_provider_signup'] = $this->userRepo->getTotalCountByCriteria($criteria);

        $criteria = ['status' => $this->jobRepo->model::INITIATED];
        $data['total_job_initiated'] = $this->jobRepo->getTotalCountByCriteria($criteria);

        $criteria = [];
        $aggregate = 'sum';
        $field = 'amount';
        $data['total_payment_collected'] = $this->paymentRepo->getTotalByCriteria($criteria, $aggregate, $field);

        return $data;
    }

}
