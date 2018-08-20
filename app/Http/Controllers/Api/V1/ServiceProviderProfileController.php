<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRepository;

class ServiceProviderProfileController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRepository $repository){
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
        $rules['pagination'] =  'nullable|boolean';
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_business_type'] = 'nullable|in:business,individual';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only(
                        'id', 'pagination', 'keyword',
                        'filter_by_business_type', 'filter_by_service',
                        'user_rating'
                        );
    
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}
}