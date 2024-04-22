<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Dashboard\AnalystService;
use App\Services\DropdownService;

class DashboardController extends Controller
{
    public function __construct(AnalystService $analyst, DropdownService $dropdown){
        $this->analyst = $analyst;
        $this->dropdown = $dropdown;
    }

    public function index(){
        switch(\Auth::user()->userrole->role->name){
            case 'Customer Relation Officer':
                return inertia('Modules/Dashboard/CRO/Index');
            break;
            case 'Analyst':
                return inertia('Modules/Dashboard/Analyst/Index',[
                    'samples' => $this->analyst->samples()
                ]);
            break;
            default:
                return inertia('Modules/Dashboard/Index',[
                    'laboratories' => $this->dropdown->laboratory_types(),
                ]);
        }   
    }
}
