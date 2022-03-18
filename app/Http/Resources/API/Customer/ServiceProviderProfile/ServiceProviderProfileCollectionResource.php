<?php

namespace App\Http\Resources\API\Customer\ServiceProviderProfile;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceProviderProfileCollectionResource extends ResourceCollection
{
    public $collects = ServiceProviderProfileResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
