<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PaymentRepository;
use App\Data\Models\Role;
use Illuminate\Http\Request;
use Validator;

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

      /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
      public function store(Request $request)
      {
        $data = $request->only('stripe_token');
        $data['user_id'] = request()->user()->id;
        $rules = [
            'stripe_token' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $code = 406;
            $output = [
               'message' => $validator->messages()->all(),
           ];
    }else{
        $result = $this->_repository->create($data);
        if($result == 'success') {
          $code = 200;
          $output = [
            'data' => $result,
            'message' => 'Payment has been made successfully',
        ];
    }else{
      $code = 406;
      $output = [
        'message' => $result,
    ];
    }
   }
   return response()->json($output, $code);
 }
}
