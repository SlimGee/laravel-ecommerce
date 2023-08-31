<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateGeneralSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'site_name' => 'required|string|max:255',
            'legal_name' => 'required|string|max:255',
            'contact_email' => 'required|string|email|max:255',
            'sender_email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|min:10',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'currency' => 'required|string|max:3',
            'currency_symbol' => 'required|string|max:2',
            'google_analytics_code' => 'sometimes|nullable|string',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function ($validator) {
            $validator->setData(
                collect($validator->getData())
                    ->filter(fn ($value) => $value)
                    ->all()
            );
        });
    }
}
