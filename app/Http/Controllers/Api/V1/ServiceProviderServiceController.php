<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderServiceRepository;

class ServiceProviderServiceController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderServiceRepository $repository)
    {
        $this->_repository = $repository;
    }

}
