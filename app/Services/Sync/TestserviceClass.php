<?php

namespace App\Services\Sync;

use App\Models\ListTestservice;
use App\Traits\HandlesCurl;

class TestserviceClass
{
    use HandlesCurl;

    public function upload(){
        $testservices = ListTestservice::where('is_synced',0)->get();
        $postData = array(
            'testservices' => $testservices
        );
        try{
            $url = $this->link.'/api/01101011%2001110010%2001100001%2001100100/services/upload';
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$this->api,
                'Content-Type: application/json',
              ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            return $response;
            $datas = json_decode($response);
            $synced = $datas->success;

            foreach($synced as $code){
                $check = ListTestservice::where('code',$code)->update(['is_synced' => 1]);
            }

            return response()->json($datas);

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
