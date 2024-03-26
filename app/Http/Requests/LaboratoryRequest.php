<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|unique:laboratories,name,'.$this->id,
            'code' => 'sometimes|required|string|unique:laboratories,code,'.$this->id,
            'contact_no' => 'sometimes|nullable|string|max:50',
            'type_id' => 'sometimes|required',
            'member_since' => 'sometimes|required',
            'member_id' => 'sometimes|required',
            'address' => 'sometimes|nullable|string|max:200',
            'region_code' => 'sometimes|required',
            'province_code' => 'sometimes|required',
            'municipality_code' => 'sometimes|required',
            'barangay_code' => 'sometimes|nullable',
            'longitude' => 'sometimes|required',
            'latitude' => 'sometimes|required',
        ];
    }
}
