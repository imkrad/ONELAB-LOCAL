<?php

namespace App\Services\Lists;

use App\Models\Member;
use App\Models\Laboratory;
use App\Models\LocationRegion;
use App\Models\ListDropdown;
use App\Http\Resources\Lists\LaboratoryResource;

class LaboratoryService
{
    public function lists($request){
        $data = LaboratoryResource::collection(
            Laboratory::query()
            ->with('member','type')
            ->with('address.region:code,name,region','address.province:code,name','address.municipality:code,name','address.barangay:code,name')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('acronym', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $laboratory = Laboratory::create($request->all());
        $laboratory->address()->create($request->except(['name','code','contact_no','type_id','member_id']));

        return [
            'data' => $laboratory,
            'message' => 'Laboratory creation was successful!', 
            'info' => "You've successfully created the laboratory."
        ];
    }

    public function regions(){
        $data = LocationRegion::all()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->region
            ];
        });
        return $data;
    }

    public function types(){
        $data = ListDropdown::where('classification','Agency Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function members(){
        $data = Member::get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }
}
