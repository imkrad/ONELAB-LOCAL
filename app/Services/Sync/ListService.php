<?php

namespace App\Services\Sync;

use App\Models\Member;
use App\Models\Configuration;
use App\Models\Laboratory;
use App\Models\ListDropdown;
use App\Models\ListName;
use App\Models\ListMethod;
use App\Models\ListRole;
use App\Traits\HandlesCurl;

class ListService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('lists','count');
        return json_decode($response);
    }

    public function fetch(){
        set_time_limit(0);
        $arrays = ['dropdowns','names','methods','roles'];
        try {
            foreach($arrays as $array){
                $response = $this->handleCurl('lists',$array);
                $lists = json_decode($response);
                
                foreach($lists as $data){
                    switch($array){
                        case 'dropdowns':
                            ListDropdown::insertOrIgnore((array)$data); 
                        break;
                        case 'names':
                            ListName::insertOrIgnore((array)$data); 
                        break;
                        case 'methods':
                            ListMethod::insertOrIgnore((array)$data); 
                        break;
                        case 'roles':
                            ListRole::insertOrIgnore((array)$data); 
                        break;
                    }
                }
            }
            $response = true;
        }catch (Exception $e){
            $response = 'Caught exception: '.$e->getMessage();
        }
        return $response;
    }


    public function names(){
        set_time_limit(0);
        $arrays = ['names','methods'];
        try {
            foreach($arrays as $array){
                $response = $this->handleCurl('lists',$array);
                $lists = json_decode($response);
                
                foreach($lists as $data){
                    switch($array){
                        case 'names':
                            ListName::insertOrIgnore((array)$data); 
                        break;
                        case 'methods':
                            $m = (array)$data;
                            $m['fee'] = trim(str_replace(',','',$m['fee']),'₱ ');
                            str_replace('"', '', $m['fee']);
                            ListMethod::insertOrIgnore($m); 
                        break;
                    }
                }
            }
            $response = true;
        }catch (Exception $e){
            $response = 'Caught exception: '.$e->getMessage();
        }
        return $response;
    }
}
