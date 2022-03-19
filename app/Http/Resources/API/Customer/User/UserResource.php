<?php

namespace App\Http\Resources\API\Customer\User;

use App\Http\Resources\API\Shared\CityArea\CityAreaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'profile_image' => $this->profile_image,
            'city_area' => new CityAreaResource($this->cityArea),
            'phone_number' => $this->phone_number,
        ];
    }
}
