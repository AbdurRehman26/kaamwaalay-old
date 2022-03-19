<?php

namespace App\Services\Customer;

use App\Data\Models\User;

class ServiceProviderProfileService
{
    public function getServiceProviderProfiles()
    {
        $query = User::serviceProvider();

        return $query->paginate(20);
    }
}
