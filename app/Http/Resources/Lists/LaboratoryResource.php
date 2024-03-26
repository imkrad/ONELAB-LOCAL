<?php

namespace App\Http\Resources\Lists;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaboratoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'member' => $this->member->name,
            'website' => $this->member->website,
            'avatar' => $this->member->avatar,
            'is_dost' => $this->member->is_dost,
            'code' => $this->code,
            'member_since' => $this->member_since,
            'contact_no' => $this->contact_no,
            'type' => $this->type->others,
            'address' => $this->address->address,
            'latitude' => $this->address->latitude,
            'longitude' => $this->address->longitude,
            'region' => ($this->address->region) ? $this->address->region->region : null,
            'province' => ($this->address->province) ? $this->address->province->name : null,
            'municipality' => ($this->address->municipality) ?  $this->address->municipality->name : null,
            'barangay' => ($this->address->barangay) ? $this->address->barangay->name : null,
            'is_active' => $this->member->is_active
        ];
    }
}
