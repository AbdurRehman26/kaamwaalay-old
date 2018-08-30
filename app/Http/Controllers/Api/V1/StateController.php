<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\StateRepository;

class StateController extends ApiResourceController
{
    public $_repository;

    public function __construct(StateRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'show') {
            $rules['id'] =  'required|exists:states,id';
        }

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['country_id']    =  'nullable|exists:countries,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'country_id');
        return $input;
    }
}
