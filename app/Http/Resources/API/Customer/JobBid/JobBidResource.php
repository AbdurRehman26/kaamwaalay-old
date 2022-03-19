<?php

namespace App\Http\Resources\API\Customer\JobBid;

use App\Http\Resources\API\Customer\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JobBidResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'is_awarded' => $this->is_awarded,
            'description' => $this->description,
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
