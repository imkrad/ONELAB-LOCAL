<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'mode' => $this->mode,
            'total' => $this->total,
            'subtotal' => $this->subtotal,
            'discount' => $this->discount,
            'discounted' => $this->discounted,
            'laboratory' => $this->laboratory,
            'purpose' => $this->purpose->name,
            'status' => $this->status,
            'customer' => new CustomerViewResource($this->customer),
            'conforme' => $this->conforme->name, 
            'conforme_no' => $this->conforme->contact_no, 
            'received' => $this->createdby->profile->firstname.' '.$this->createdby->profile->lastname,
            'samples' => $this->samples,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
