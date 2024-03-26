<?php

namespace App\Services\Testservices;

use App\Traits\HandlesCurl;

class ApiService
{
    use HandlesCurl;

    public function search($request){
        // $keyword = $request->keyword;
        // $type = $request->type;
        // $laboratory = $request->laboratory_type;
        // $url = '?type='.$type.'&laboratory='.$laboratory.'&keyword='.str_replace('+', ' ', $keyword);
        $postData = array(
            'type' => $request->type,
            'laboratory' => $request->laboratory_type,
            'keyword' => $request->keyword
        );
        // $response = $this->handleCurl('search','names'.$url);

        $response = $this->handlePost($postData,'search/names');
        return json_decode($response);
    }   

    public function methods_lists($request){
        $postData = array(
            'laboratory' => $request->laboratory_type,
            'keyword' => $request->keyword
        );
        $response = $this->handlePost($postData,'search/methods');
        return json_decode($response);
    }   

    public function add($request){
        $postData = array(
            'laboratory_type' => $request->laboratory_type,
            'name' => $request->name,
            'type_id' => $request->type_id
        );
        $response = $this->handlePost($postData,'store/names');
        return json_decode($response);
    }

    public function method($request){
        $postData = array(
            'laboratory_type' => $request->laboratory_type,
            'method_id' => $request->method_id,
            'reference_id' => $request->reference_id,
            'fee' => $request->fee
        );
        $response = $this->handlePost($postData,'store/methods');
        return json_decode($response);
    }
}
