<?php

namespace App\Services\Testservices;

use App\Models\Laboratory;
use App\Models\ListDropdown;
use App\Models\ListTestservice;

class SaveService
{
    public $laboratory;

    public function __construct()
    {
        $this->laboratory = config('app.laboratory');
    }

    public function create($request){
        $code = $this->generateCode($request->laboratory_type);
        $service = ListTestservice::create(array_merge($request->all(),['code' => $code, 'laboratory_id' => $this->laboratory]));
        return [
            'data' => $service,
            'message' => 'Testservice creation was successful!', 
            'info' => "You've successfully created the new testservice."
        ];
    }

    public function generateCode($laboratory_type){
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $type = ListDropdown::where('id',$laboratory_type)->first();
        $c = ListTestservice::where('laboratory_type',$laboratory_type)->count();
        $code = $lab->code.'S-'.$type->others.'-'.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
