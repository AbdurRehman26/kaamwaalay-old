<?php

namespace App\Http\Resources\API\Customer\Job;

use Illuminate\Http\Resources\Json\ResourceCollection;

class JobCollectionResource extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
