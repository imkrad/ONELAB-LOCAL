<?php

namespace App\Services;

use App\Models\Draft;
use App\Http\Resources\TsrResource;

class DraftService
{
    public function lists($request){
        $data = TsrResource::collection(
            Draft::query()
            ->with('laboratory','purpose','status','received.profile')
            ->with('customer.customer_name','conforme','customer.address.region','customer.address.province','customer.address.municipality','customer.address.barangay')
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('customer',function ($query) use ($keyword) {
                    $query->whereHas('customer_name',function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', "%{$keyword}%");
                    });
                });
            })
            ->orderBy('created_at','DESC')
            ->get()
        );
        return $data;
    }

    public function save($request){
        $data = Draft::create(array_merge($request->all(),[
            'samples' => json_encode([]),
            'analysis' => json_encode([]),
            'status_id' => 1,
            'mode' => json_encode($request->mode),
            'customer_id' => $request->customer['value'],
            'received_by' => \Auth::user()->id
        ]));

        return [
            'data' => $data,
            'message' => 'TS Request creation was successful!', 
            'info' => "You've successfully created the new request."
        ];
    }
}
