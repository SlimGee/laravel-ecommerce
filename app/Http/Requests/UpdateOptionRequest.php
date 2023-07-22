<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('option'));
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation(): void
    {
        $this->replace([
            'name' => $this->option['name'],
            'values' => collect($this->option['values'])
                ->filter()
                ->map(fn($value) => ['value' => $value])
                ->toArray(),
        ]);
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
            'option.values.*' =>
                'sometimes|nullable|string|distinct:ignore_case|max:255',
        ];
    }
}
