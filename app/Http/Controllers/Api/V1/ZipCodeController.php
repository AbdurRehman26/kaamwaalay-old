<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ZipCodeRepository;

class ZipCodeController extends ApiResourceController
{
    public $_repository;

   public function __construct(ZipCodeRepository $repository){
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