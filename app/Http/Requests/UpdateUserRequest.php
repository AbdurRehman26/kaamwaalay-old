<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
        'id' =>  'required|exists:users,id',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users,email,'. auth()->user()->id,
        'profile_image' => 'nullable|string',
        'business_details.business_type' => 'nullable|in:business,individual',
        'business_details.is_featured' => 'nullable|in:1,0',
        'service_details.*.id' => 'nullable|exists:service_provider_services,service_provider_profile_request_id',
        'service_details.*.service_id' => 'nullable|exists:services,id',
        ];
    }
}
