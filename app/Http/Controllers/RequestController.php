<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownService;

class RequestController extends Controller
{
    public function __construct(DropdownService $dropdown){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            default :
            return inertia('Modules/Requests/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    'purposes' => $this->dropdown->purposes(),
                    'modes' => $this->dropdown->modes(),
                    'discounts' => $this->dropdown->discounts()
                ]
            ]);
        }
    }
}
