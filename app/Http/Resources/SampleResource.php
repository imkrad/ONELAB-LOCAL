<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SampleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'customer_description' => $this->customer_description,
            'description' => $this->description,
            'is_disposed' => $this->is_disposed,
            'analyses' => AnalysisResource::collection($this->analyses),
            'selected' => false
        ];
    }
}
