<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'access_level' => $this->access_level,
            'activated_at' => $this->activated_at,
            'activation_key' => $this->activation_key,
            'address' => $this->address,
            'apartment' => $this->apartment,
            'avg_rating' => $this->avg_rating,
            'card_brand' => $this->card_brand,
            'card_last_four' => $this->card_last_four,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'formatted_created_at' => $this->formatted_created_at,
            'id' => $this->id,
            'is_profile_completed' => $this->is_profile_completed,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            'profileImage' => $this->profileImage,
            'profile_image' => $this->profile_image,
            'role' => $this->role,
            'role_id' => $this->role_id,
            'social_account_id' => $this->social_account_id,
            'social_account_type' => $this->social_account_type,
            'status' => $this->status,
            'stripe_id' => $this->stripe_id,
            'total_finshed_jobs' => $this->total_finshed_jobs,
            'total_inbidding_jobs' => $this->total_inbidding_jobs,
            'total_initiated_jobs' => $this->total_initiated_jobs,
            'total_urgent_jobs_completed' => $this->total_urgent_jobs_completed,
            'total_urgent_jobs_created' => $this->total_urgent_jobs_created,
            'trial_ends_at' => $this->trial_ends_at,
            'updated_at' => $this->updated_at,
            'zip_code' => $this->zip_code,
            'city' => $this->city?->name ?? '',
            'city_id' => $this->city_id,
            'state' => $this->state?->name ?? '',
            'state_id' => $this->state_id,
            'country' => $this->country?->name ?? '',
            'country_id' => $this->country_id,
        ];
    }
}
