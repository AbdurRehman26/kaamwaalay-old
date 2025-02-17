<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\UserAgentRepository;

class UserAgentController extends ApiResourceController
{
    public $_repository;

    public function __construct(UserAgentRepository $repository)
    {
        $this->_repository = $repository;
    }
}
