<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PaymentRepository;
use App\Data\Models\Role;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use App\Data\Models\Plan;

class PaymentController extends ApiResourceController
{
    public $_repository;

    public function __construct(PaymentRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'index') {
            if($value == 'index') {
                $rules['pagination']        =   'nullable|boolean';
                $rules['filter_by_pay_by']  =   'nullable|in:'.Role::SERVICE_PROVIDER.','.Role::CUSTOMER;
                $rules['filter_by_type']    =   'nullable|in:urgent_job,featured_profile,account_creation';
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

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->only('stripe_token','plan_id');

        $rules = [
            'stripe_token' => [
                'required',
            ],
            'plan_id' => [
                'required',
                Rule::notIn([
                    Plan::URGENT,
                    Plan::ACCOUNT_CREATION,
                ]),
                'exists:plans,id',
            ],
        ];

        $this->validate($request, $rules);

        $result = $this->_repository->create($data);
        if(!empty($result['id'])) {
            $code = 200;
            $output = [
                'data' => $result,
                'message' => 'Payment has been made successfully',
            ];
        }else{
            $errorResponse = ValidationException::withMessages(
                ['message'=> $result ]
            );
            $errorResponse->status = 406;
            throw $errorResponse;
        }
        return response()->json($output, $code);
    }
}
