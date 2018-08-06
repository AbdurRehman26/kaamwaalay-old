<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\TestimonialRepository;

class TestimonialController extends ApiResourceController
{
    public $_repository;

   public function __construct(TestimonialRepository $repository){
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