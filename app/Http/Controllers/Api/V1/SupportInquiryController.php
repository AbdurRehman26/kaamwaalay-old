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
    const   PER_PAGE = 10;

    public function __construct(SupportInquiryRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {
            $rules['support_question_id'] =  'required|exists:support_questions,id';
            $rules['message']      =  'required|max:1000';
            $rules['email']      =  'nullable|email';
        }

        if($value == 'update') {
            $rules['id'] =  'required|exists:support_inquiries,id';
            $rules['is_replied']    =  'nullable|boolean';
        }

        if($value == 'show') {
            $rules['id'] =  'required|exists:support_inquiries,id';
        }

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['type_id']       =  'nullable|in:'.Role::SERVICE_PROVIDER.','.Role::CUSTOMER;
            $rules['keyword']       =  'nullable|string';
        }

        return $rules;

    }


    public function input($value='')
    {

        if($value == 'index'){
            $input = request()->only('pagination', 'type_id', 'keyword');
        }

        if($value == 'store'){
            $input = request()->only('support_question_id', 'message', 'user_id');
            $input['user_id'] = request()->user()->id;
        }

        if($value == 'show'){
            $input = request()->only('id');
        }

        if($value == 'update'){
            $input = request()->only('id', 'is_replied');
        }

        return $input;
    }
}
