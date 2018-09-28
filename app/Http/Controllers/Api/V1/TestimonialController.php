<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\TestimonialRepository;

class TestimonialController extends ApiResourceController
{
	public $_repository;

	public function __construct(TestimonialRepository $repository)
	{
		$this->_repository = $repository;
	}
	public function rules($value='')
	{
		$rules = [];
		return $rules;

	}


	public function input($value='')
	{
		$input = request()->only('filter_by_count', 'filter_by_type', 'filter_by_role');

		return $input;
	}

}
