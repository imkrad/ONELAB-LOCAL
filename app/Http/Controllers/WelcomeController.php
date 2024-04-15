<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        if(\Auth::check()){
            return inertia('Modules/Dashboard/Index');
        }else{
            return inertia('Auth/Login');
        }
    }
}
