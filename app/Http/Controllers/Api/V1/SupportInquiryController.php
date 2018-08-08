<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\SupportInquiryRepository;
use App\Data\Models\Role;

class SupportInquiryController extends ApiResourceController
{
    public $_repository;

    public function __construct(SupportInquiryRepository $repository){
        $this->_repository = $repository;
    }

    public function rules($value=''){
        $rules = [];

        if($value == 'store'){
            $rules['support_question_id'] =  'required|exists:support_questions,id';
            $rules['message']      =  'required';
            $rules['email']      =  'nullable|email';
        }

        if($value == 'update'){

        }


        if($value == 'destroy'){

        }

        if($value == 'show'){

        }

        if($value == 'index'){
            $rules['pagination']    =  'nullable|boolean';
            $rules['type_id']       =  'nullable|in:'.Role::SERVICE_PROVIDER.','.Role::CUSTOMER;
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'support_question_id', 'name', 'email', 'message', 'type_id', 'keyword');
        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        return $input;
    }
}