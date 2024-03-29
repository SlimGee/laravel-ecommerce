<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('product'));
    }

    /**
     * Prepare input for validation
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'track_quantity' => $this->has('track_quantity') &&
                $this->input('track_quantity') == 'on',
            'sell_out_of_stock' => $this->has('sell_out_of_stock') &&
                $this->input('sell_out_of_stock') == 'on',
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string|unique:products,sku,'.
                $this->route('product')->id,
            'track_quantity' => 'sometimes|nullable|boolean',
            'quantity' => 'required_if:track_quantity,true|nullable|int',
            'sell_out_of_stock' => 'required_if:track_quantity,true|boolean',
            'category_id' => 'required|int|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'cost' => 'sometimes|nullable|numeric',
            'discounted_price' => 'sometimes|nullable|numeric',
            'status' => 'required|string|in:active,draft,review',
            'images' => 'sometimes|nullable|array',
            'images.*' => 'string',
            'options' => 'nullable|array',
            'options.*' => 'int|exists:options,id',
            'variations' => 'nullable|array',
            'variations.*' => 'int|exists:variations,id',
            'canonical_url' => 'sometimes|nullable|string|max:255|url|active_url',
            'seo_title' => 'sometimes|nullable|string|max:255',
            'seo_description' => 'sometimes|nullable|string|max:255',
            'seo_keywords' => 'sometimes|nullable|string|max:255',
        ];
    }
}
