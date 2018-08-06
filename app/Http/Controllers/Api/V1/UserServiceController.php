<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserServiceRepository;

class UserServiceController extends ApiResourceController
{
    public $_repository;

   public function __construct(UserServiceRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value='')
   {
       return [
           'id' => [
               'required',
               'exists',
           ],
       ];
   }

   public function input($value='')
   {
       return request()->only('id', 'title');
   }
}