<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnalysisResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fee' => $this->fee,
            'status' => $this->status,
            'testname' => $this->testservice->testname->name,
            'method' => $this->testservice->method->method->name,
            'reference' => $this->testservice->method->reference->name,
        ];
    }
}
