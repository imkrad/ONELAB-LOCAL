<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownService;
use App\Services\RequestService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\TsrRequest;

class RequestController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownService $dropdown, RequestService $req){
        $this->dropdown = $dropdown;
        $this->req = $req;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->req->lists($request);
            break;
            default :
            return inertia('Modules/Requests/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratory_types(),
                    'purposes' => $this->dropdown->purposes(),
                    'modes' => $this->dropdown->modes(),
                    'discounts' => $this->dropdown->discounts(),
                    'statuses' => $this->dropdown->statuses('Request'),
                ]
            ]);
        }
    }

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
