<?php

namespace App\Services\Sync;

use App\Models\Member;
use App\Models\Laboratory;
use App\Models\Address;
use App\Traits\HandlesCurl;

class LaboratoryService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('laboratories','count');
        return json_decode($response);
    }

    public function fetch(){
        set_time_limit(0);
        try {
            $response = $this->handleCurl('laboratories','data');
            $names = json_decode($response);
            foreach($names as $data){
                $member = (array)$data;
                $laboratories = array_splice($member,9);
                $q = Member::insertOrIgnore($member);
                foreach($data->laboratories as $laboratory)
                {   
                    $lst1 = (array)$laboratory;
                    $address = array_pop($lst1);
                    $q = Laboratory::insertOrIgnore($lst1);
                   
                    $address = (array)$address;
                    $q = Address::insertOrIgnore((array)$address);
                    

                } 
            }
            $response = true;
        }catch (Exception $e){
            $response = 'Caught exception: '.$e->getMessage();
        }
        return $response;
    }
}
