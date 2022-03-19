<?php

namespace App\Http\Requests\API\Customer\Job;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
                'service_id' => 'required|exists:services,id',
                'title' => ['required', 'string'],
                'address' => ['required', 'string'],
                'apartment' => ['nullable', 'string'],
                'description' => ['required', 'string'],
                'preference' => ['required', 'string', Rule::in([
                        'choose_date',
                        'few_days',
                        'with_in_a_week',
                        'any_time',
                    ]),
                ],
                'schedule_at' => [
                'string',
                Rule::requiredIf(function () {
                    return request()->get('preference') === 'choose_date'
                        || false;
                }),
            ],
        ];
    }
}
