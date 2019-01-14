<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobBidRepository;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class JobBidController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobBidRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

        if(empty($this->input()['is_invited'])){
            $rules['amount'] =  'required_without:is_tbd';    
            $rules['is_tbd'] =  'required_without:amount';    


            $rules['job_id'] = [
                'required',
                'exists:jobs,id',
                Rule::unique('job_bids')->where(function ($query) {
                    $query->where('user_id', $this->input()['user_id'])
                    ->whereNull('deleted_at')
                    ->where('status' , '!=', 'invited');
                }),
            ];

        }



        if(!empty($this->input()['is_invited'])){

            $rules['job_id'] = [
                'required',
                'exists:jobs,id',
                Rule::unique('job_bids')->where(function ($query) {
                    $query->where('user_id', $this->input()['user_id'])
                    ->whereNull('deleted_at');
                }),
            ];
        }



    }

    if($value == 'update'){

        if(!empty($this->input('update')['is_awarded']) && $this->input('update')['is_awarded']){

            $rules['job_id'] = [
                'required',
                Rule::unique('job_bids')->where(function ($query) {
                    $query->where('is_awarded' , '=', 1);
                }),
            ];

        }

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
        'is_archived',
        'count_only',
        'is_awarded',
        'filter_by_tbd',
        'filter_by_awarded_status',
        'amount_type',
        'is_visit_required',
        'preferred_date',
        'preferred_time',
        'suggested_date',
        'suggested_time',
        'user_id',
        'is_invited',
        'visit_details',
        'job_done_images'
    );

    if(!empty($input['is_visit_required'])){
        $input['amount'] = null;
        $input['is_tbd'] = 0;
        $input['preferred_time'] = Carbon::parse($input['preferred_time'])->toTimeString();
        if(!empty($input['suggested_time'])) {
            $input['suggested_time'] = Carbon::parse($input['suggested_time'])->format('H:i:s');
        }
    }

    if(!empty($input['is_tbd'])){
        $input['amount'] = null;
        $input['is_visit_required'] = 0;
        unset($input['preferred_date'] , $input['preferred_time']);
    }

    if(!empty($input['amount'])){
        $input['is_visit_required'] = 0;
        $input['is_tbd'] = 0;
        unset($input['preferred_date'] , $input['preferred_time']);
    }


    if($value == 'store' || $value == 'update'){

        unset(
            $input['filter_by_status'], $input['filter_by_job_id'], $input['pagination']
        );

        if(!empty($input['status']) && $input['status'] == 'rejected'){
            $input['deleted_at'] = Carbon::now()->toDateTimeString();
            $input['status'] = 'pending';
        }

    }

    if($value == 'store'){
        unset($input['is_awarded']);
        
        $input['status'] = 'pending';
        if(!empty($input['is_invited'])){
            $input['status'] = 'invited';
        }
    }

    if(empty($input['user_id'])){

        $input['user_id'] = request()->user()->id;
    }


    return $input;
}

public function messages($value = '')
{
    $messages = [
        'job_id.unique' => 'A bid has already been placed.',
        'job_id.required' => 'Job field is required.',
    ];
    return $messages;
}
public function responseMessages($value = '')
{
    if(!empty($this->input('store')['is_invited'])){
         $messages = [
            'store' => 'Invitation has been sent successfully.',
        ];
    }

    if($value == 'update'){
         $messages = [
            'update' => 'Bid has been successfully updated.',
        ];
    }
    
    if($value == 'store' &&   empty($this->input('store')['is_invited'])){
         $messages = [
            'store' => 'Bid has been placed successfully.',
        ];
    }

    return !empty($messages[$value]) ? $messages[$value] : 'Success.';
}


}