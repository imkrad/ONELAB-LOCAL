<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TargetService;
use App\Traits\HandlesTransaction;

class TargetController extends Controller
{
    use HandlesTransaction;

    public function __construct(TargetService $target){
        $this->target = $target;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->target->lists($request);
            break;
        }
    }

    public function store(TsrRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->target->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
