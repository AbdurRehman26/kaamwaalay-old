<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobBidRepository;

class JobBidController extends ApiResourceController
{
    public $_repository;

   public function __construct(JobBidRepository $repository){
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