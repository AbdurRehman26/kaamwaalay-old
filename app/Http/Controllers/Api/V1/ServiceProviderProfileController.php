<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Models\User;
use App\Data\Repositories\ServiceProviderProfileRepository;
use App\Http\Resources\API\Customer\User\UserCollectionResource;
use App\Http\Resources\API\Customer\User\UserResource;
use App\Services\Customer\ServiceProviderProfileService;
use Illuminate\Http\Request;

class ServiceProviderProfileController
{
    public $_repository;
    public $serviceProviderProfileService;

    public function __construct(ServiceProviderProfileRepository $repository, ServiceProviderProfileService $serviceProviderProfileService)
    {
        $this->serviceProviderProfileService = $serviceProviderProfileService;
        $this->_repository = $repository;
    }

    public function rules($value = '')
    {
        $rules = [];

        if ($value == 'index') {
            $rules['pagination'] = 'nullable|boolean';
            $rules['keyword'] = 'nullable|string';
            $rules['filter_by_business_type'] = 'nullable|in:business,individual';
            $rules['from_explore'] = 'nullable|boolean';
        }

        return $rules;
    }


    public function input($value = '')
    {
        $input = request()->only(
            'id',
            'pagination',
            'keyword',
            'filter_by_business_type',
            'filter_by_service',
            'user_rating',
            'city_area',
            'filter_by_featured',
            'is_approved',
            'user_detail',
            'is_verified',
            'filter_by_top_providers',
            'from_explore'
        );

        if (request()->user()) {
            $input['user_id'] = request()->user()->id;
        }

        if ($value != 'update') {
            unset($input['is_verified']);
        }

        if ($value == 'update') {
            unset($input['user_id']);
        }

        return $input;
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function index(Request $request): UserCollectionResource
    {
        return new  UserCollectionResource($this->serviceProviderProfileService->getServiceProviderProfiles());
    }
}
