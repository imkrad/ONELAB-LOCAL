<?php

namespace App\Services\Sync;

use App\Models\Address;
use App\Models\Customer;
use App\Models\CustomerName;
use App\Traits\HandlesCurl;

class CustomerService
{
    use HandlesCurl;

    public function upload(){
        $customers = Customer::with('address','customer_name')->where('is_synced',0)->get();
        $postData = array(
            'customers' => $customers,
            'laboratory_id' => $this->laboratory
        );
        try{
            $url = $this->link.'/api/01101011%2001110010%2001100001%2001100100/customers/upload';
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
            $datas = json_decode($response);
            $synced = $datas->success;

            foreach($synced as $code){
                $check = Customer::where('code',$code)->update(['is_synced' => 1]);
            }

            return response()->json($datas);

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function download(){
        set_time_limit(0);
        if($this->names()){
            $response = $this->handleCurl('customers','download');
            $customers = json_decode($response);
            try{
                $result = \DB::transaction(function () use ($customers){
                    $users = array();
                    $success = array();
                    $failed = array();
                    $duplicate = array();
                    foreach($customers as $data){
                        $code = $data->code;
                        $arr = (array)$data;
                        $count = Customer::where('code',$code)->count();

                        $sub = array_splice($arr,15);
                            $address = $sub['address'];
                            $arr['is_synced'] = 1;
                            unset($address->id);

                        if($count == 0){
                            
                            \DB::beginTransaction();
                            $customer = Customer::create($arr);
                            if($customer){
                                $address = (array)$address;
                                $address['is_synced'] = 1;
                                $address = $customer->address()->create($address);
                                if($address){
                                    array_push($success,$code);
                                    \DB::commit();  
                                }else{
                                    array_push($failed,$code);
                                    \DB::rollback();
                                }
                            }else{
                                array_push($failed,$code);
                                \DB::rollback();
                            }
                        }else{
                            array_push($duplicate,$code);
                        }
                    }

                    $result = [
                        'success' => $success,
                        'failed' => $failed,
                        'duplicate' => $duplicate,
                    ];
                    return $result;
                });
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            return $result;
        }
    }

    public function names(){
        try {
            $response = $this->handleCurl('customers','names');
            $lists = json_decode($response);
            
            foreach($lists as $data){
                CustomerName::insertOrIgnore((array)$data); 
            }
            $response = true;
        }catch (Exception $e){
            $response = 'Caught exception: '.$e->getMessage();
        }
        return $response;
    }
    
}
