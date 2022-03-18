<?php

namespace App\Services\Customer;

use App\Data\Models\ServiceProviderProfile;

class ServiceProviderProfileService
{
    public function getServiceProviderProfiles()
    {
        $query = ServiceProviderProfile::query();
        if (! empty($data['filter_by_service'])) {

            $query->join('service_provider_services', function ($join) use ($data) {
                $join->on('service_provider_profiles.id', '=', 'service_provider_services.service_provider_profile_id')
                    ->where(function ($query) use ($data) {
                        $query->where('service_provider_services.service_id', $data['filter_by_service']);
                    });
            })
                ->select('service_provider_profiles.*')
                ->groupBy('service_provider_profiles.user_id');
        }

        return $query->paginate(20);
    }
}
