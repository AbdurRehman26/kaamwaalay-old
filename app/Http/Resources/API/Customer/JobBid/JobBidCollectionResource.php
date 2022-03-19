<?php

namespace App\Http\Resources\API\Customer\JobBid;

use Illuminate\Http\Resources\Json\ResourceCollection;

class JobBidCollectionResource extends ResourceCollection
{
    public $collects = JobBidResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
