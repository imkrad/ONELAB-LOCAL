<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Sync\ListService;
use App\Services\Sync\LocationService;
use App\Services\Sync\CustomerService;
use App\Services\Sync\LaboratoryService;
use App\Services\Sync\TestserviceClass;

class SyncController extends Controller
{
    public function __construct(
        ListService $list, 
        LocationService $location, 
        LaboratoryService $laboratory,
        CustomerService $customer,
        TestserviceClass $test,
        )
    {
        $this->list = $list;
        $this->location = $location;
        $this->customer = $customer;
        $this->laboratory = $laboratory;
        $this->test = $test;
    }

    public function checkApi(){
        return $this->location->checkConnection();
    }

    public function fetchCount(){
        $array = [
            'lists' => $this->list->fetchCount(),
            'locations' => $this->location->fetchCount(),
            'laboratories' => $this->laboratory->fetchCount(),
        ];
        return $array;
    }

    public function locations(){
        return $this->location->fetch();
    }

    public function lists(){
        return $this->list->fetch();
    }

    public function names(){
        return $this->list->names();
    }

    public function laboratories(){
        return $this->laboratory->fetch();
    }

    public function customers_download(Request $request){
        return $this->customer->download();
    }

    public function customers_upload(Request $request){
        return $this->customer->upload();
    }

    public function testservices_upload(Request $request){
        return $this->test->upload();
    }
}
