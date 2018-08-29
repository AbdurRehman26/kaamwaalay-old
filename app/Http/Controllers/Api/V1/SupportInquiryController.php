<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\SupportInquiryRepository;
use App\Data\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class SupportInquiryController extends ApiResourceController
{
    public $_repository;
    const   PER_PAGE = 25;

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
            $rules['id'] =  'required|exists:support_inquiries,id';
            $rules['is_replied']    =  'nullable|boolean';
        }

        if($value == 'show'){
            $rules['id'] =  'required|exists:support_inquiries,id';
        }

        if($value == 'index'){
            $rules['pagination']    =  'nullable|boolean';
            $rules['type_id']       =  'nullable|in:'.Role::SERVICE_PROVIDER.','.Role::CUSTOMER;
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'support_question_id', 'name', 'email', 'message', 'type_id', 'keyword', 'is_replied');
        $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;

        if($value == 'store'){
            unset($input['keyword']);
            unset($input['is_replied']);
            unset($input['pagination']);
            unset($input['id']);
        }
        if($value == 'update'){
            unset($input['user_id']);
        }
        
        if($value == 'update'){
            unset($input['user_id']);
        }
        return $input;
    }

}