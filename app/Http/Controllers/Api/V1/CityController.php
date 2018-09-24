<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\CityRepository;

class CityController extends ApiResourceController
{
    public $_repository;

    public function __construct(CityRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'show') {
            $rules['id'] =  'required|numeric|exists:cities,id';
        }

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['state_id'] =  'nullable|numeric|exists:states,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'state_id', 'keyword', 'details');
        return $input;
    }
}
