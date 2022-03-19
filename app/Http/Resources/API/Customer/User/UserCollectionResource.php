<?php

namespace App\Http\Resources\API\Customer\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollectionResource extends ResourceCollection
{
    public $collects = UserResource::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
