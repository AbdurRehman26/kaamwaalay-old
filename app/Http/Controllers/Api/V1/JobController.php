<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobRepository;

class JobController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

    }

    if($value == 'update'){

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
    $input = request()->only('id', 'title', 'user_id', 'service_id', 'country_id', 'state_id', 'city_id', 'title', 'description', 'address', 'apartment', 'zip_code', 'images', 'schedule_at', 'preference', 'status', 'job_type' , 'filter_by');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}
}