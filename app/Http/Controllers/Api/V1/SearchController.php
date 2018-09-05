<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;
use App\Data\Repositories\SearchRepository;

class SearchController extends ApiResourceController
{
    public $_repository;
    const   PER_PAGE = 25;

    public function __construct(SearchRepository $repository)
    {
        $this->_repository = $repository;
    }

    
    public function rules($value='')
    {
        $rules = [];

        if($value == 'show') {
            $rules['id'] =  'required|numeric|exists:services,id';
        }

        if($value == 'index') {
            $rules['pagination']    =  'nullable|boolean';
            $rules['state_id'] =  'required|numeric|exists:states,id';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'state_id');
        return $input;
    }
    public function show(Request $request,$id)
    {
        dd("ppop");
    }

}
