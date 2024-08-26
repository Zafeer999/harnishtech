<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCtaSectionRequest extends FormRequest
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
            'image' => 'sometimes|image',
            'small_text' => 'sometimes|string',
            'main_black_text' => 'sometimes|string',
            'button_text' => 'sometimes|string',
            'button_color' => 'sometimes', // color dropdown
            'button_link' => 'nullable|url',
            'status' => 'sometimes|boolean',
        ];
    }
}
