<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\NotificationRepository;

class NotificationController extends ApiResourceController
{
    public $_repository;

   public function __construct(NotificationRepository $repository){
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