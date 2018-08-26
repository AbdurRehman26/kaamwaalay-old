<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PaymentRepository;
use App\Data\Models\Role;

class PaymentController extends ApiResourceController
{
    public $_repository;

    public function __construct(PaymentRepository $repository){
        $this->_repository = $repository;
    }

    public function rules($value=''){
        $rules = [];

        if($value == 'index'){
            if($value == 'index'){
                $rules['pagination']        =   'nullable|boolean';
                $rules['filter_by_pay_by']  =   'nullable|in:'.Role::SERVICE_PROVIDER.','.Role::CUSTOMER;
                $rules['filter_by_type']    =   'nullable|in:urgent,featured,account creation';
                $rules['keyword']           =   'nullable|string';
            }

        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'filter_by_pay_by', 'filter_by_type', 'keyword');
        return $input;
    }
}