<?php

namespace App\Http\Resources\API\Customer\Job;

use App\Http\Resources\API\Customer\User\UserResource;
use App\Http\Resources\API\Shared\CityArea\CityAreaResource;
use App\Http\Resources\API\Shared\Service\ServiceResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'preference' => $this->preference,
            'job_type' => $this->job_type,
            'status' => $this->status,
            'address' => $this->address,
            'schedule_at' => Carbon::parse($this->schedule_at)->diffForHumans(),
            'is_archived' => $this->is_archived,
            'city_area' => new CityAreaResource($this->cityArea),
            'service' => new ServiceResource($this->service),
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'awarded_to' => null,
            'bids_count' => $this->totalBids(),
            'awarded_bid' => $this->awardedBid,
            'user' => new UserResource($this->user),
        ];
    }
}
