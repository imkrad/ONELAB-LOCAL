<?php

namespace App\Services;

use App\Models\Tsr;
use App\Models\Laboratory;
use App\Models\ListDropdown;

class RequestService
{
    public $laboratory;

    public function __construct()
    {
        $this->laboratory = config('app.laboratory');
    }

    public function save($request){
        $data = Tsr::create(array_merge($request->all(),[
            'code' => $this->generateCode($request),
            'status_id' => 1,
            'mode' => json_encode($request->mode),
            'customer_id' => $request->customer['value'],
            'received_by' => \Auth::user()->id
        ]));
        $data->payment()->create(array_merge($request->all(),[
            'status_id' => 5,
        ]));

        return [
            'data' => $data,
            'message' => 'TS Request creation was successful!', 
            'info' => "You've successfully created the new request."
        ];
    }

    private function generateCode($request){
        $laboratory_type = $request->laboratory_id;
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $lab_type = ListDropdown::select('others')->where('id',$laboratory_type)->first();
        $c = Tsr::where('laboratory_id',$laboratory_type)->count();
        $code = $lab->code.'-'.date('Y').'-'.$lab_type->others.'-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
