<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\RoleRepository;

class RoleController extends ApiResourceController
{
    public $_repository;

    public function __construct(RoleRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {

        }

        if($value == 'update') {

        }


        if($value == 'destroy') {

        }

        if($value == 'show') {
              $rules['id'] =  'required|exists:roles,id';
        }

        if($value == 'index') {
              $rules['pagination']    =  'nullable|boolean';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination');
        //$input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        return $input;
    }
}
