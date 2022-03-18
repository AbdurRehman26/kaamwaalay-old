<?php

namespace App\Http\Resources\API\Shared\CityArea;

use Illuminate\Http\Resources\Json\JsonResource;

class CityAreaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
