<?php

namespace App\Services;

use App\Models\Target;

class TargetService
{
    public function save($request){
       

        return [
            'data' => $data,
            'message' => 'Target was set successfully!', 
            'info' => "You've successfully created the new target."
        ];
    }

}
