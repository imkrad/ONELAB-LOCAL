<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        switch(\Auth::user()->role){
            case 'Customer Relation Officer':
                return inertia('Modules/Dashboard/CRO/Index');
            break;
            default:
                return inertia('Modules/Dashboard/Index');
        }   
    }
}
