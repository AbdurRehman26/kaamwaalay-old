<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ZipCodeRepository;

class ZipCodeController extends ApiResourceController
{
    public $_repository;

    public function __construct(ZipCodeRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'index') {
              $rules['pagination'] =  'nullable|boolean';
              $rules['zip_code']    = 'nullable|string';
        }

        return $rules;

    }


	public function input($value='')
	{
        $input = request()->only(
            'zip_code', 'pagination'
        );

	    $input['id'] = !empty(request()->user()->id) ? request()->user()->id : null;
	    request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);

	        return $input;
	}
}
