<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestserviceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->id,
            'code' => $this->code,
            'sampletype' => $this->sampletype->name,
            'testname' => $this->testname->name,
            'method' => $this->method->method->name,
            'reference' => $this->method->reference->name,
            'fee' => $this->method->fee,
        ];
    }
}
