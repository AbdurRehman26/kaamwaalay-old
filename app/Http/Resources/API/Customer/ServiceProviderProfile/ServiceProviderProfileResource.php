<?php

namespace App\Http\Resources\API\Customer\ServiceProviderProfile;

use App\Http\Resources\API\Customer\User\UserResource;
use App\Http\Resources\API\Shared\Service\ServiceCollectionResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceProviderProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'years_of_experience' => $this->years_of_experience,
            'business_type' => $this->business_type,
            'business_name' => $this->business_name,
            'business_details' => $this->business_details,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'finished_jobs' => $this->totalFinishedJobs(),
            'services_offered' => new ServiceCollectionResource($this->servicesOffered),
        ];
    }
}
