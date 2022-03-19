<?php

namespace App\Http\Resources\API\Customer\Job;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\API\Customer\Job\JobResource;

class JobCollectionResource extends ResourceCollection
{
    public $collects = JobResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
