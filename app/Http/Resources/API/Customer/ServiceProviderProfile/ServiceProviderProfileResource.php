<?php

namespace App\Http\Resources\API\Customer\ServiceProviderProfile;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\Customer\User\UserResource;

class ServiceProviderProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'business_name' => $this->business_name,
            'business_details' => $this->business_details,
            'user' => new UserResource($this->user),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'finished_jobs' => $this->totalFinishedJobs(),
        ];
    }
}
