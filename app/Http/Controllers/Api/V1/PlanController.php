<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PlanRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlanController extends ApiResourceController
{
    public $_repository;

    public function __construct(PlanRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'update') {
            $rules['id'] =  'required|in:1,2|exists:plans,id';
            $rules['amount'] = 'required|numeric|not_in:0';
        }

        if($value == 'show') {
            $rules['id'] =  'required|exists:plans,id';
        }

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['type']          =  'nullable|in:service,job';
            $rules['product']    = 'nullable|in:featured_profile,account_creation,urgent_job';
        }

        if($value == 'updateOrAddPlans') {
            $rules['plans_data.*.id']               = 'nullable|exists:plans,id|not_in:1,2';
            $rules['plans_data.*.amount']           = 'required|numeric|not_in:0';
            $rules['plans_data.*.quantity']         = 'required|numeric|not_in:0';
        }

        if($value == 'store') {
            $rules['amount']     = 'required|numeric|not_in:0';
            $rules['type']       = 'required|in:job,service';
            $rules['id']         = 'nullable|exists:plans,id';
        }

        if($value == 'destroy') {
            $rules['id']     = 'required|exists:plans,id';
        }

        return $rules;

    }

    public function input($value='')
    {

        if($value == 'index'){
            $input = request()->only('pagination', 'type','product');
        }

        if($value == 'show'){
            $input = request()->only('id');
        }

        if($value == 'update') {
            $input = request()->only('id', 'amount');
        }

        if($value == 'updateOrAddPlans'){
            $input = request()->only('plans_data');
        }

        if($value == 'store') {
            $input = request()->only('id','product','amount','quantity','type');
        }

        if($value == 'destroy') {
            $input = request()->only('id');
        }

        return $input;
    }

    public function updateOrAddPlans(Request $request)
    {

        $rules = $this->rules(__FUNCTION__);
        $input = $this->input(__FUNCTION__);
        $messages = $this->messages(__FUNCTION__);
        $this->validate($request, $rules);

        $output = ['errors' => 
        [
            'message' => ['There might be something wrong.']
        ]
    ];
    $code = Response::HTTP_NOT_ACCEPTABLE;

    $response = $this->_repository->updateOrAddPlans($input);
    if($response) {
        $code = Response::HTTP_OK;
        $output = [
            'data' => $response,
            'message' => 'Records has been added successfully',
            'code' => $code
        ];
    }


    return response()->json($output, $code);

}

public function messages($value = '')
{
    $messages = [
        'amount.not_in' => 'The entered amount is invalid.',
        'plans_data.*.amount.not_in' => 'The entered amount is invalid.',
    ];

    return $messages;
}

public function store(Request $request)
{
    $rules = $this->rules(__FUNCTION__);
    $input = $this->input(__FUNCTION__);
    if( $input['type'] == 'job'){
        $rules['product']    = 'required|in:urgent_job';
    }else{
        $rules['product']    = 'required|in:featured_profile,account_creation';
    } 
    if(($input['type'] == 'job' && $input['product'] == 'urgent_job') || ($input['type'] == 'service' && $input['product'] == 'account_creation')){
        $rules['quantity']   = 'nullable';
    }else{
        $rules['product']    = 'required|in:featured_profile,account_creation';
    }
    $this->validate($request, $rules);
    $output = ['errors' => 
    [
        'message' => ['There might be something wrong.']
    ]
];
$code = Response::HTTP_NOT_ACCEPTABLE;
$response = $this->_repository->create($input);
if($response) {
    $code = Response::HTTP_OK;
    $output =  [
        'data' => $response,
        'message' => 'Records has been added successfully',
        'code' => $code
    ];
}
return response()->json($output, $code);
}

}
