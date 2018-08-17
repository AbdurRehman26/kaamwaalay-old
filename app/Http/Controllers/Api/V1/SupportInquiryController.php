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
        $input = request()->only('id', 'pagination', 'support_question_id', 'name', 'email', 'message', 'type_id', 'keyword', 'is_replied');
        //$input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        return $input;
    }
    //Get all records
    public function index(Request $request)
    {
        $rules = $this->rules(__FUNCTION__);
        $input = $this->input(__FUNCTION__);

        $this->validate($request, $rules);
        
        $per_page = self::PER_PAGE ? self::PER_PAGE : config('app.per_page');

        $pagination = !empty($input['pagination']) ? $input['pagination'] : false; 

        $data = $this->_repository->findByAll($pagination, $per_page, $input);
        //$count = $this->_repository->getServiceCount();
        $output = [
            'response' => [
                'data' => $data['data']['data'],
                'inquiry_count' => $data['record_count'],
                'pagination' => !empty($data['pagination']) ? $data['pagination'] : false,
                'message' => $this->response_messages(__FUNCTION__),
            ]
        ];

        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }
}