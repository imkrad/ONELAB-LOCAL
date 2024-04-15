<?php

namespace App\Services;

use App\Models\TsrAnalysis;
use App\Models\TsrPayment;
use App\Http\Resources\AnalysisResource;

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
        $data = TsrAnalysis::with('sample','testservice.method.method','status','analyst')->where('id',$data->id)->first();
        $this->updateTotal($data->sample->tsr_id,$request->fee);

        return [
            'data' => new AnalysisResource($data),
            'message' => 'Analysis added was successful!', 
            'info' => "You've successfully created the new analysis."
        ];
    }

    private function updateTotal($id,$fee){
        $data = TsrPayment::where('tsr_id',$id)->first();
        $fee = (float) trim(str_replace(',','',$fee),'₱ ');
        $data->total = (float) $data->total + $fee;
        $data->save();
    }
}
