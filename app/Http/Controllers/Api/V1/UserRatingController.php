<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRatingRepository;

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
            $rules['job_id']        =  'required|numeric|exists:jobs,id';
            $rules['message']       =  'required|alpha_num';
            $rules['rating']        =  'required|numeric|max:5';
            $rules['user_service_id']        =  'required|numeric|exists:service_provider_services,id';
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
            $input = request()->only('rating', 'message', 'job_id', 'user_service_id', 'user_id');
            $input['rated_by'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        }

        if($value == 'show'){
            $input = request()->only('id');
        }

        return $input;
    }

}
