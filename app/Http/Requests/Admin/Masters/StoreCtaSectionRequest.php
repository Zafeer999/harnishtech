<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreCtaSectionRequest extends FormRequest
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
            'image' => 'required|image',
            'small_text' => 'required|string',
            'main_text' => 'required|string',
            'button_text' => 'required|string',
            'button_color' => 'required',// color dropdown
            'button_link' => 'nullable|url',
            'status' => 'sometimes|boolean',
        ];
    }
}
