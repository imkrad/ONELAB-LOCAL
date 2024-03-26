<?php

namespace App\Services\Sync;

use App\Models\LocationRegion;
use App\Models\LocationBarangay;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Traits\HandlesCurl;

class LocationService
{
    use HandlesCurl;

    public function fetchCount(){
        $response = $this->handleCurl('locations','count');
        return json_decode($response);
    }

    public function fetch(){
        set_time_limit(0);
        ini_set('memory_limit', '256M');
        $arrays = ['regions','provinces','municipalities','barangays'];
        try {
            foreach($arrays as $array){
                $response = $this->handleCurl('locations',$array);
                $locations = json_decode($response);
                
                foreach($locations as $location){
                    switch($array){
                        case 'regions':
                            LocationRegion::insertOrIgnore((array)$location); 
                        break;
                        case 'provinces':
                            LocationProvince::insertOrIgnore((array)$location); 
                        break;
                        case 'municipalities':
                            LocationMunicipality::insertOrIgnore((array)$location); 
                        break;
                        case 'barangays':
                            LocationBarangay::insertOrIgnore((array)$location); 
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

    public function checkConnection(){
        $response = $this->handleApi();
        return $response;
    }
}
