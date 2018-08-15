<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\PlanRepository;

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

    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'updateOrAddPlans'){
        $rules['plans_data.*.id']               = 'nullable|exists:plans,id|not_in:1';
        $rules['plans_data.*.amount']           = 'required|numeric|not_in:0';
        $rules['plans_data.*.quantity']         = 'required|numeric|not_in:0';
    }

    if($value == 'index'){

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
    $input = request()->only('id', 'title');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}

}