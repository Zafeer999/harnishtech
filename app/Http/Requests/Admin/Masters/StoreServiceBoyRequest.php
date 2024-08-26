<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceBoyRequest extends FormRequest
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
            // User table fields validation
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'mobile' => 'required|string|unique:users,mobile|min:10|max:10',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:password',
            // Service boys table fields validation
            'emp_code' => 'required|string|unique:service_boys,emp_code|max:50',
            'gender' => 'required|in:male,female,other',
            'dob' => 'required|date',
            'doj' => 'required|date',
            'address' => 'required|string|max:500',
        ];
    }
}
