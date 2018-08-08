<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\StateRepository;

class StateController extends ApiResourceController
{
    public $_repository;

    public function __construct(StateRepository $repository){
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

    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'pagination', 'country_id');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;

    return $input;
}
}