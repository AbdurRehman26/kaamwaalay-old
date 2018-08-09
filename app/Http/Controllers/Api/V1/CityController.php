<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\CityRepository;

class CityController extends ApiResourceController
{
    public $_repository;

    public function __construct(CityRepository $repository){
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

    if($value == 'index'){
        $rules['pagination']    =  'nullable|boolean';
        $rules['state_id']      =  'required|numeric';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'pagination', 'state_id');
    
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}
}