<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobRepository;
use Illuminate\Validation\Rule;

class JobController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){
        $rules['service_id'] = 'required|exists:services,id';
        $rules['state_id'] = 'required|exists:states,id';
        $rules['country_id'] = 'required|exists:countries,id';
        $rules['city_id'] = 'required|exists:cities,id';
        $rules['user_id'] = 'required|exists:users,id';
    }

    if($value == 'update'){
        $rules['id'] =  'required|exists:jobs,id';
        $rules['service_id'] = 'required|exists:services,id';
        $rules['state_id'] = 'required|exists:states,id';
        $rules['country_id'] = 'required|exists:countries,id';
        $rules['city_id'] = 'required|exists:cities,id';
        $rules['user_id'] = [
            'required',
            Rule::exists('jobs')->where(function ($query) {
                $query->where('user_id', $this->input()['user_id']);
            }),
        ];

    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'index'){

        $rules['filter_by_user'] = 'nullable|exists:users,id';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only(
        'id','title','user_id','service_id','country_id','state_id',
        'city_id','title','description','address','apartment','zip_code',
        'images','schedule_at','preference','status','job_type',
        'filter_by_status', 'filter_by_service', 'keyword','pagination', 'bid_data','filter_by_user'
    );

    if($value == 'store'){
        unset($input['status']);
    }

    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null;
    request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);

    return $input;
}


public function response_messages($value = '')
{
    $messages = [
        'store' => 'Job created successfully.',
        'update' => 'Job updated successfully.',
        'destroy' => 'Job deleted successfully.',
    ];

    return !empty($messages[$value]) ? $messages[$value] : 'Success.';
}

}