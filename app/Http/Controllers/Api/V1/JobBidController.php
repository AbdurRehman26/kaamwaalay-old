<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobBidRepository;
use Illuminate\Validation\Rule;

class JobBidController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobBidRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

        $rules['amount'] =  'required_without:is_tbd';    
        $rules['is_tbd'] =  'required_without:amount';    
        $rules['job_id'] = [
            'required',
            'exists:jobs,id',
            Rule::unique('job_bids')->where(function ($query) {
                $query->where('user_id', $this->input()['user_id']);
            }),
        ];


    }

    if($value == 'update'){

        $rules['job_id'] = [
            'required',
            Rule::unique('job_bids')->where(function ($query) {
                $query->where('is_awarded' , '=', 1);
            }),
        ];

    }
    
    return $rules;

}


public function input($value='')
{

    $input = request()->only(
        'id',
        'job_id',
        'description',
        'is_tbd',
        'amount',
        'status',
        'filter_by_status',
        'filter_by_job_id',
        'pagination',
        'user_id',
        'filter_by_invitation',
        'filter_by_archived',
        'filter_by_completed',
        'filter_by_awarded',
        'filter_by_active_bids',
        'filter_by_job_detail',
        'is_status',
        'count_only',
        'is_awarded',
        'filter_by_tbd',
        'filter_by_awarded_status',
        'amount_type',
        'is_visit_required',
        'preferred_date',
        'preferred_time'
    );


    if(!empty($input['is_visit_required'])){
        unset($input['is_tbd'], $input['amount']);

    }

    if(!empty($input['is_tbd'])){
        unset($input['amount'], $input['is_visit_required']);
    }

    if(!empty($input['amount'])){
        unset($input['is_tbd'], $input['is_visit_required']);
    }


    if($value == 'store' || $value == 'update'){

        unset(
            $input['filter_by_status'], $input['filter_by_job_id'], $input['pagination']
        );

    }

    if($value == 'store'){
        unset($input['is_awarded']);
        
        $input['status'] = 'pending';
    
    }


    $input['user_id'] = request()->user()->id;

    return $input;
}

public function messages($value = '')
{
    $messages = [
        'job_id.unique' => 'A bid has already been placed.',
    ];
    return $messages;
}


}