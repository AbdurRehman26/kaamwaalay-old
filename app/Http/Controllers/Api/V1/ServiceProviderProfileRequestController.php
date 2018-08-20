<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRequestRepository;
use App\Data\Models\Role;

class ServiceProviderProfileRequestController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRequestRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];
    
    if($value == 'store'){

    }

    if($value == 'update'){
        $rules['id']            =  'required|exists:services,id';
        $rules['status']        =  'nullable|in:approved,pending,rejected';
        $rules['reason']        =  'nullable';
        $rules['user_id']       =  'required|exists:users,id';
    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'index'){
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_business_type'] = 'nullable|in:business,individual';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'keyword','filter_by_business_type','status','reason', 'pagination', 'filter_by_service',
                            'user_details', 'profile_details');

    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    $input['role_id'] = !empty(request()->user()->role_id) ? request()->user()->role_id : null ;

    return $input;
}
}