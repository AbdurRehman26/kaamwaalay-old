<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRepository;

class UserController extends ApiResourceController
{
    public $_repository;

    public function __construct(UserRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

    }

    if($value == 'update'){

            $rules['id'] =  'required|exists:users,id';
            $rules['user_details.first_name']    = 'required';
            $rules['user_details.last_name']     = 'required';
            $rules['user_details.email']         = 'required|email|unique:users,email';
    
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
    $input = request()->only('id', 'user_details');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}


 public function messages($value = '')
    {
        $messages = [
            'user_details.last_name.required' => 'The last name field is required.'
            'user_details.last_name.required' => 'The last name field is required.'
            'user_details.last_name.required' => 'The last name field is required.'
            'user_details.last_name.required' => 'The last name field is required.'
            'user_details.last_name.required' => 'The last name field is required.'
        ];
        
        return !empty($messages) ? $messages : [];
    }

}