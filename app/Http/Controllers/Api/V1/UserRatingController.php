<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRatingRepository;
use Illuminate\Validation\Rule;

class UserRatingController extends ApiResourceController
{
    public $_repository;

    public function __construct(UserRatingRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {

            $rules['job_id'] = [
                'required',
                'exists:jobs,id',
                Rule::unique('user_ratings')->where(function ($query) use ($value) {
                    $query->where('rated_by', $this->input($value)['rated_by'])
                    ->where('job_id', $this->input($value)['job_id']);

                }),
            ];

            $rules['message']       =  'nullable';
            $rules['rating']        =  'required|numeric|max:5';
            $rules['user_service_id'] =  'numeric|exists:service_provider_services,id';
            $rules['user_id']        =  'required|numeric|exists:users,id';
        }

        if($value == 'show') {
            $rules['id']                =  'required|numeric|exists:user_ratings,id';
        }

        if($value == 'index') {
            $rules['user_id']           =  'required|numeric|exists:users,id';
            $rules['pagination']        =  'nullable|boolean';
        }

        return $rules;

    }


    public function input($value='')
    {

        if($value == 'index'){
            $input = request()->only('pagination', 'user_id');
        }

        if($value == 'store'){
            $input = request()->only('rating', 'message', 'job_id', 'user_service_id', 'user_id', 'status');
            $input['rated_by'] = request()->user()->id;
        }

        if($value == 'show'){
            $input = request()->only('id');
        }
        
        return $input;
    }
    public function responseMessages($value = '')
    {
        if(!empty($value == 'store')){
             $messages = [
                'store' => 'Review posted successfully.',
            ];
        }
        return !empty($messages[$value]) ? $messages[$value] : 'Success.';
    }

}
