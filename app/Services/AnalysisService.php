<?php

namespace App\Services;

use App\Models\TsrAnalysis;

class AnalysisService
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
        $data = TsrAnalysis::create(array_merge($request->all(),[
            'status_id' => 9,
        ]));
        $data = TsrAnalysis::where('id',$data->id)->first();

        return [
            'data' => $data,
            'message' => 'Analysis added was successful!', 
            'info' => "You've successfully created the new analysis."
        ];
    }
}
