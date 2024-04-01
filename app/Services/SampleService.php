<?php

namespace App\Services;

use App\Models\TsrSample;

class SampleService
{
    public function save($request){
        $data = TsrSample::create(array_merge($request->all(),[
            'code' => $this->generateCode($request),
        ]));

        return [
            'data' => $data,
            'message' => 'Sample added was successful!', 
            'info' => "You've successfully created the new sample."
        ];
    }

    private function generateCode($request){
        $laboratory_type = $request->laboratory_id;
        $lab_type = ListDropdown::select('others')->where('id',$laboratory_type)->first();
        $c = TsrSample::where('laboratory_id',$laboratory_type)->count();
        $code = $lab_type->others.'-'.date('Y').'-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
