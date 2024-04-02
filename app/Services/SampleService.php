<?php

namespace App\Services;

use App\Models\Tsr;
use App\Models\TsrSample;
use App\Models\ListDropdown;
use App\Http\Resources\SampleResource;

class SampleService
{
    public function lists($request){
        $data = SampleResource::collection(
            TsrSample::query()->where('tsr_id',$request->id)
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%");
            })
            ->orderBy('created_at','ASC')
            ->get()
        );
        return $data;
    }

    public function save($request){
        $data = TsrSample::create(array_merge($request->all(),[
            'code' => $this->generateCode($request),
        ]));
        $data = TsrSample::where('id',$data->id)->first();

        return [
            'data' => $data,
            'message' => 'Sample added was successful!', 
            'info' => "You've successfully created the new sample."
        ];
    }

    private function generateCode($request){
        $laboratory_type = $request->laboratory_id; $year = date('Y');
        $lab_type = ListDropdown::select('others')->where('id',$laboratory_type)->first();
        $c = TsrSample::whereHas('tsr',function ($query) use ($laboratory_type) {
            $query->where('laboratory_id',$laboratory_type);
        })->whereYear('created_at',$year)->count();
        return $lab_type->others.'-'.$year.'-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT); 
    }
}
