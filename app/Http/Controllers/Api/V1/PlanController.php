<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PlanRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlanController extends ApiResourceController
{
    public $_repository;

    public function __construct(PlanRepository $repository){
        $this->_repository = $repository;
    }

    public function rules($value=''){
        $rules = [];

        if($value == 'store'){

        }

        if($value == 'update'){
            $rules['id'] =  'required|exists:plans,id';
            $rules['amount'] = 'required';
        }


        if($value == 'destroy'){

        }

        if($value == 'show'){
            $rules['id'] =  'required|exists:plans,id';
        }

        if($value == 'index'){
            $rules['pagination']    =  'nullable|boolean';
            $rules['type']          =  'required|in:service,job';
        }

        if($value == 'updateOrAddPlans'){
            $rules['plans_data.*.id']               = 'nullable|exists:plans,id|not_in:1';
            $rules['plans_data.*.amount']           = 'required';
            $rules['plans_data.*.quantity']         = 'required';
        }

        return $rules;

    }

    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'type', 'plans_data', 'amount');
        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;

        if($value == 'update'){
            unset($input['user_id']);
        }

        return $input;
    }

    public function updateOrAddPlans(Request $request)
    {
        
        $rules = $this->rules(__FUNCTION__);
        $input = $this->input(__FUNCTION__);

        $this->validate($request, $rules);
        

        $output = ['errors' => 
                    [
                        'message' => ['There might be something wrong.']
                    ]
                ];
        $code = Response::HTTP_NOT_ACCEPTABLE;

        $response = $this->_repository->updateOrAddPlans($input);
        if($response){
            $code = Response::HTTP_OK;
            $output = ['response' => 
                        [
                            'data' => $response,
                            'message' => 'Records has been added successfully',
                            'code' => $code
                        ]
                    ];
        }

    
        return response()->json($output, $code);

    }

}