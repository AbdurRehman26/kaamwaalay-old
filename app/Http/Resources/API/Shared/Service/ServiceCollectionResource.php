<?php

namespace App\Http\Resources\API\Shared\Service;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\API\Shared\Service\ServiceResource;

class ServiceCollectionResource extends ResourceCollection
{
    public $collects = ServiceResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
