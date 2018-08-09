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
                $query->where('user_id', 1);
            }),
        ];


    }

    if($value == 'update'){
        $rules['job_id'] = [
            'required',
            Rule::exists('job_bids')->where(function ($query) {
                $query->where('user_id', 1);
            }),
        ];


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
    $input = request()->only('id', 'job_id', 'description', 'is_tbd', 'amount');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : 1;
    return $input;
}
}