<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'discount_type' => 'required|string|in:flat,percent',
            'discount_value' => 'required|string',
            'min_value' => 'required|numeric|lte:max_value',
            'max_value' => 'required|numeric|gte:min_value',
            'expiry_date' => 'required',
            'expiry_count' => 'required',
        ];
    }
}
