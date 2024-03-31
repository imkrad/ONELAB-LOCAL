<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DropdownService;
use App\Services\CustomerService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    use HandlesTransaction;

    public function __construct(CustomerService $customer, DropdownService $dropdown){
        $this->customer = $customer;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'pick':
                return $this->customer->pick($request);
            break;
            case 'search':
                return $this->customer->search($request);
            break;
            case 'lists':
                return $this->customer->lists($request);
            break;
            case 'counts':
                return $this->customer->counts($request);
            break;
            case 'syncable':
                return $this->customer->syncable();
            break;
            default :
            return inertia('Modules/Customers/Index',[
                'dropdowns' => [
                    'bussinesses' => $this->dropdown->bussiness_nature(),
                    'industries' => $this->dropdown->industry_type(),
                    'classes' => $this->dropdown->classes(),
                    'regions' => $this->dropdown->regions()
                ]
            ]);
        }
    }

    public function store(CustomerRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            if($request->type == 'customer'){
                return $this->customer->save($request);
            }else{
                return $this->customer->conforme($request);
            }
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function show($id){
        $customer = $this->customer->view($id);
       
        return inertia('Modules/Customers/Profile/Index',[
            'customer' => $customer
        ]);
    }
}
