<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Services\Testservices\ApiService;
use App\Services\Testservices\SaveService;
use App\Services\Testservices\ViewService;
use App\Services\DropdownService;
use App\Traits\HandlesTransaction;
use Illuminate\Http\Request;
use App\Http\Requests\NameRequest;

class TestserviceController extends Controller
{
    use HandlesTransaction;

    public function __construct(ViewService $view, SaveService $save, ApiService $api, DropdownService $dropdown){
        $this->dropdown = $dropdown;
        $this->view = $view;
        $this->save = $save;
        $this->api = $api;
    }

    public function index(Request $request){
        $option = $request->option;
        switch($option){
            case 'lists':
                return $this->view->lists($request);
            break;
            case 'syncable':
                return $this->view->syncable();
            break;
            case 'search':
                return $this->api->search($request);
            break;
            case 'methods':
                return $this->api->methods_lists($request);
            break;
            default : 
            return inertia('Modules/Services/Testservices/Index',[
                'dropdowns' => [
                    'laboratories' => $this->dropdown->laboratories(),
                    'types' => $this->dropdown->laboratory_types()
                ]
            ]);
        }
    }

    public function store(NameRequest $request){
        $option = $request->option;
        switch($option){
            case 'add':
                return $this->api->add($request);
            break;
            case 'create':
                $result = $this->handleTransaction(function () use ($request) {
                    return $this->save->create($request);
                });

                return back()->with([
                    'data' => $result['data'],
                    'message' => $result['message'],
                    'info' => $result['info'],
                    'status' => $result['status'],
                ]);
            break;
            case 'method':
                return $this->api->method($request);
            break;
        }
    }
}
