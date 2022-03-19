<?php

namespace App\Http\Resources\API\Customer\User;

use App\Data\Models\Role;
use App\Http\Resources\API\Customer\ServiceProviderProfile\ServiceProviderProfileResource;
use App\Http\Resources\API\Shared\CityArea\CityAreaResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile_image' => $this->profile_image,
            'city_area' => new CityAreaResource($this->cityArea),
            'phone_number' => $this->phone_number,
            'service_provider_profile' => $this->when($this->role_id === Role::SERVICE_PROVIDER, new ServiceProviderProfileResource($this->serviceProviderProfile)),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
