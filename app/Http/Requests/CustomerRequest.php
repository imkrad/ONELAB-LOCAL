<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer' => 'required',
            'has_branches' => 'sometimes|required',
            'name' => 'sometimes|required_if:has_branches,true|unique:customers,name,NULL,'.$this->id.',name_id,'.$this->name_id,
            'email' => 'sometimes|required|email',
            'bussiness_id' => 'sometimes|required|integer',
            'industry_id' => 'sometimes|required|integer',
            'classification_id' => 'sometimes|required|integer',
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
