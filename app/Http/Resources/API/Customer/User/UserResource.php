<?php

namespace App\Http\Resources\API\Customer\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\Shared\CityArea\CityAreaResource;

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
        ];
    }
}
