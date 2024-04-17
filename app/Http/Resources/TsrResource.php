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
            'laboratory' => $this->laboratory->name,
            'purpose' => $this->purpose->name,
            'status' => $this->status,
            'customer' => new CustomerViewResource($this->customer),
            'conforme' => $this->conforme->name, 
            'conforme_no' => $this->conforme->contact_no, 
            'received' => $this->received->profile->firstname.' '.$this->received->profile->lastname,
            'payment' => $this->payment,
            'due_at' => $this->due_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
