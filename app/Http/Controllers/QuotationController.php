<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuotationService;
use App\Services\DropdownService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\TsrRequest;

class QuotationController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownService $dropdown, QuotationService $quot){
        $this->dropdown = $dropdown;
        $this->quot = $quot;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->quot->lists($request);
            break;
            case 'samples':
                return $this->quot->samples($request);
            break;
            case 'print':
                return $this->quot->print($request);
            break;
            default :
            return inertia('Modules/Quotations/Index',[
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

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'quotation':
                    return $this->quot->save($request);
                break;
                case 'sample':
                    return $this->quot->saveSample($request);
                break;
                case 'one':
                    return $this->quot->saveOne($request);
                break;
                case 'many':
                    return $this->quot->saveMany($request);
                break;
            }
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            switch($request->option){
                case 'Confirm':
                    return $this->quot->confirm($request);
                break;
                case 'Cancel':
                    return $this->quot->cancel($request);
                break;
            }
        });
        
        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
