<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManufacturerRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:255|unique:manufacturers,name',
            'url' => 'nullable|url|max:255',
            'support_url' => 'nullable|url|max:255',
            'support_phone' => 'required|string|max:20',
            'support_email' => 'required|email|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'This manufacturer name is already exist.',
            'support_phone.required' => 'Support phone number is required.',
            'support_email.required' => 'Support email is required.',
            'support_email.email' => 'Please provide a valid email address.',
        ];
    }
}
