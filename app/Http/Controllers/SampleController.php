<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SampleService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\SampleRequest;

class SampleController extends Controller
{
    use HandlesTransaction;

    public function __construct(SampleService $sample){
        $this->sample = $sample;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->sample->lists($request);
            break;
        }
    }

    public function store(SampleRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->sample->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
