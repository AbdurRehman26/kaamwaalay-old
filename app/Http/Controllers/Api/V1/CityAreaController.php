<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\CityAreaRepository;

class CityAreaController extends ApiResourceController
{
    public $_repository;

    public function __construct(CityAreaRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['city_id'] =  'nullable|numeric|exists:cities,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'city_id');
        return $input;
    }
}
