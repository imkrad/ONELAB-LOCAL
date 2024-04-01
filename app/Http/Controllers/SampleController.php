<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SampleService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\SampleRequest;

class SampleController extends Controller
{
    public function store(TsrRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->req->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
