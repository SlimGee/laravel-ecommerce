<?php

namespace App\Http\Requests;

use App\Models\Option;
use Illuminate\Foundation\Http\FormRequest;

class StoreOptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Option::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'option.name' => 'required|string',
            'option.values' => 'required|array|min:1',
            'option.values.*' => 'sometimes|nullable|string|distinct:ignore_case|max:255',
        ];
    }

    protected function passedValidation()
    {
        $this->replace([
            'turbo' => $this->turbo,
            'name' => $this->option['name'],
            'values' => collect($this->option['values'])
                ->filter()
                ->map(fn ($value) => ['value' => $value])
                ->toArray(),
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'option.name.required' => 'The option name is required',
            'option.values.*.string' => 'The option value must be a string',
        ];
    }
}
