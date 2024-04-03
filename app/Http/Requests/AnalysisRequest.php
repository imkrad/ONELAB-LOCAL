<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalysisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'testservice_id' => 'sometimes|required|integer',
            'sample_id' => 'sometimes|required|integer',
            'fee' => 'sometimes|required'
        ];
    }
}
