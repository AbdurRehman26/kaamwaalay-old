<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\SupportQuestionRepository;

class SupportQuestionController extends ApiResourceController
{
    public $_repository;

    public function __construct(SupportQuestionRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['role_id']      =  'required|numeric|exists:roles,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'role_id');
        return $input;
    }
}
