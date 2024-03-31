<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsrRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer' => 'sometimes|required',
            'conforme_id' => 'sometimes|required|integer',
            'laboratory_id' => 'sometimes|required|integer',
            'purpose_id' => 'sometimes|required|integer',
            'discount_id' => 'sometimes|required|integer',
            'due_at' => 'sometimes|required',
            'mode' => 'required|array|min:1',
            'mode.*' => 'required|integer|distinct|min:1'
        ];
    }
}
