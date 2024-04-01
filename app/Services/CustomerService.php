<?php

namespace App\Services;

use Hashids\Hashids;
use App\Models\Customer;
use App\Models\Laboratory;
use App\Models\CustomerName;
use App\Models\CustomerConforme;
use App\Http\Resources\CustomerResource;

class CustomerService
{
    public $laboratory;

    public function __construct()
    {
        $this->laboratory = config('app.laboratory');
    }

    public function lists($request){
        $data = CustomerResource::collection(
            Customer::query()
            ->with('customer_name:id,name','bussiness:id,name','classification:id,name','industry:id,name')
            ->with('address.region:code,name,region','address.province:code,name','address.municipality:code,name','address.barangay:code,name')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function view($id){
        $hashids = new Hashids('krad',10);
        $id = $hashids->decode($id);

        $data = new CustomerResource(
            Customer::query()
            ->with('customer_name:id,name','bussiness:id,name','classification:id,name','industry:id,name')
            ->with('address.region:code,name,region','address.province:code,name','address.municipality:code,name','address.barangay:code,name')
            ->where('id',$id)->first()
        );
        return $data;
    }

    public function save($request){
        if($request->customer['value'] === $request->customer['name']){
            $name = new CustomerName;
            $name->name = $request->customer['value'];
            $name->has_branches = 1;
            if($name->save()){
                $request['name_id'] = $name->id;
            }
        }else{
            $request['name_id'] = $request->customer['value'];
        }
        $code = $this->generateCode($request->region_code);
        $customer = Customer::create(array_merge($request->all(),['code' => $code, 'laboratory_id' => $this->laboratory]));
        $customer->address()->create($request->except(['name','is_main','email','bussiness_id','industry_id','classification_id','contact_no','name_id','customer','has_branches','type']));

        return [
            'data' => $customer,
            'message' => 'Customer creation was successful!', 
            'info' => "You've successfully created the new customer."
        ];
    }

    public function conforme($request){
        $data = CustomerConforme::create($request->all());
        $customer = CustomerConforme::findOrFail($data->id);
        $conforme = [
            'value' => $customer->id,
            'name' => $customer->name,
            'contact_no' => $customer->contact_no
        ];
        return [
            'data' => $conforme,
            'message' => 'Conforme creation was successful!', 
            'info' => "You've successfully created the new conforme."
        ];
    }

    public function search($request){
        $keyword = $request->keyword;
        $data = CustomerName::where('name', 'LIKE', "%{$keyword}%")->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'has_branches' => $item->has_branches
            ];
        });
        return $data;
    }

    public function pick($request){
        $keyword = $request->keyword;
        $data = Customer::with('conformes')->with('customer_name')->where('name', 'LIKE', "%{$keyword}%")
        ->orWhereHas('customer_name', function ($query) use ($keyword) {
            $query->where('name', 'LIKE', "%$keyword%");
        })
        ->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->customer_name->name.' - '.$item->name,
                'conformes' => $item->conformes->map(function ($i) {
                    return [
                        'value' => $i->id,
                        'name' => $i->name,
                        'contact_no' => $i->contact_no
                    ];
                })
            ];
        });
        return $data;
    }

    public function counts($id){
        $array = [
            ['counts' => 1000,'name' => 'Wallet', 'icon' => 'ri-wallet-3-fill', 'color' => 'primary'],
            ['counts' => 5, 'name' => 'Total Request', 'icon' => 'ri-list-check-2', 'color' => 'success'],
            ['counts' => 20000,'name' => 'Total Spend', 'icon' => 'ri-hand-coin-fill', 'color' => 'info'],
        ];
        return $array;
    }

    public function syncable(){
        $data = Customer::where('is_synced',0)->count();
        return $data;
    }

    public function generateCode($region){
        $lab = Laboratory::where('id',$this->laboratory)->first();
        $c = Customer::count();
        $code = $lab->code.str_pad(($c+1), 5, '0', STR_PAD_LEFT);  
        return $code;
    }
}
