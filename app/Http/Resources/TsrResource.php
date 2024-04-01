<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TsrResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'mode' => $this->mode,
            'laboratory' => $this->laboratory,
            'purpose' => $this->purpose,
            'status' => $this->status,
            'customer' => $this->customer,
            'conforme' => $this->conforme, 
            'received' => $this->received,
            'payment' => $this->payment,
            'due_at' => $this->due_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
