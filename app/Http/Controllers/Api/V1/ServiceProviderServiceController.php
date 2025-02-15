<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\ServiceProviderServiceRepository;

class ServiceProviderServiceController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderServiceRepository $repository)
    {
        $this->_repository = $repository;
    }

}
