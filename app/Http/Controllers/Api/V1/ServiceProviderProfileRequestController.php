<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRequestRepository;
use App\Data\Models\Role;

class ServiceProviderProfileRequestController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRequestRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];
        

        if($value == 'update'){
          $rules['id']            =  'required|exists:service_provider_profile_requests,id';
          $rules['status']        =  'nullable|in:approved,pending,rejected,in-review';
          $rules['reason']        =  'nullable';
      }

      if($value == 'index'){
          $rules['keyword']    = 'nullable|string';
          $rules['filter_by_business_type'] = 'nullable|in:business,individual';
      }

      return $rules;

  }


  public function input($value='')
  {
    $input = request()->only(
        'id', 'keyword', 'filter_by_business_type', 'status', 'reason', 'pagination', 'filter_by_service', 
        'user_details', 'profile_details', 'filter_by_status'
    );

    if (request()->user()) {
        $input['user_id'] = request()->user()->id;
        $input['role_id'] = request()->user()->role_id;
    }



    if($value == 'update'){

        unset(
            $input['keyword'], $input['filter_by_business_type'], $input['pagination'], $input['filter_by_service'],
            $input['user_details'], $input['profile_details'], $input['filter_by_status']
        );

    }

    return $input;
}

public function getUserApprovedProfile()
{

    $criteria = ['user_id' => request()->user()->id , 'status' => 'approved'];
    $data = $this->_repository->findByCriteria($criteria, true);

    $details = ['orderBy' => 'desc'];

    if(!$data){

        $criteria = ['user_id' => request()->user()->id];
        $data = $this->_repository->findByCriteria($criteria, true, $details);

    }

    if(!$data){

        $criteria = ['user_id' => request()->user()->id];
        $data = $this->_repository->findByCriteria($criteria, true, $details);

    }

    $data = $data ? $data : new \StdClass();


    $output = [
            'data' => $data,
    ];

        // HTTP_OK = 200;
    $code = 200;

    return response()->json($output, $code);
}

}
