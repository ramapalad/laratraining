<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $assetId = $this->route('asset');
        
        return [
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'assigned_to_user_id' => 'nullable|exists:users,id',
            'asset_tag' => 'nullable|string|max:255|unique:assets,asset_tag',
            'name' => 'required|string|max:255|unique:assets,name',
            'serial_number' => 'nullable|string|max:255|unique:assets,serial_number',
            'model_name' => 'nullable|string|max:255',  
            'purchase_date' => 'nullable|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:'. implode(',', array_column(AssetStatusEnum::cases(), 'value')),
            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'location_id.required' => 'The location field is required.',
            'location_id.exists' => 'The selected location is invalid.',
            'manufacturer_id.required' => 'The manufacturer field is required.',
            'manufacturer_id.exists' => 'The selected manufacturer is invalid.',
            'assigned_to_user_id.exists' => 'The selected user is invalid.',
            'asset_tag.unique' => 'The asset tag has already been taken.',
            'name.required' => 'The name field is required.',
            'name.unique' => 'The asset name has already been taken.',
            'serial_number.unique' => 'The serial number has already been taken.',
            'model_name.max' => 'The model name may not be greater than 255 characters.',
            'purchase_date.date' => 'The purchase date is not a valid date.',
            'purchase_price.numeric' => 'The purchase price must be a number.',
            'purchase_price.min' => 'The purchase price must be at least 0.',
            'status.in' => 'The selected status is invalid.',
            'notes.max' => 'The notes may not be greater than 1000 characters.',
        ];
    }
}
