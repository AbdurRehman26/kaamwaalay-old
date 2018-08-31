<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderServiceRepository;

class ServiceProviderServiceController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderServiceRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'title');
    $input['user_id'] = request()->user()->id;
    return $input;
}
}