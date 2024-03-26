<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\Lists\LaboratoryService;
use App\Http\Requests\LaboratoryRequest;

class LaboratoryController extends Controller
{
    use HandlesTransaction;

    public function __construct(LaboratoryService $laboratory){
        $this->laboratory = $laboratory;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->laboratory->lists($request);
            break;
            default :
            return inertia('Modules/Lists/Laboratories/Index',[
                'regions' => $this->laboratory->regions(),
                'types' => $this->laboratory->types(),
                'members' => $this->laboratory->members()
            ]);
        }
    }

    public function store(LaboratoryRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->laboratory->save($request);
        });
        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
