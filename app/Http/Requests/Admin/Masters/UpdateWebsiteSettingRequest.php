<?php

namespace App\Http\Requests\Admin\Masters;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsiteSettingRequest extends FormRequest
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
            'is_service_charge_enable' => 'required',
            'service_charge' => 'required|numeric',
            'is_gst_enable' => 'required',
            'gst_percentage' => 'required|numeric|max:50',
            'schedule_same_day_if_booked_before' => 'required',
            'max_discount_percent' => 'required|numeric|max:80',
            'header_logo' => 'nullable',
            'footer_address' => 'required|max:225',
            'footer_phone' => 'required|max:100',
            'footer_hours' => 'required|max:100',
            'support_email' => 'required|max:100',
        ];
    }
}
