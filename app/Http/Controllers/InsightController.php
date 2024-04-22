<?php

namespace App\Http\Controllers;

use App\Models\Tsr;
use App\Models\TsrPayment;
use App\Models\TsrAnalysis;
use App\Models\Target;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\CustomerTopResource;
use App\Http\Resources\TestnameTopResource;

class InsightController extends Controller
{
    public function index(Request $request){
        $option = $request->option;
        switch($option){
            case 'lists':
                return [
                    'counts' => $this->counts($request),
                    'customers' => $this->topcustomers($request),
                    'testnames' => $this->toptestnames($request),
                    'totalanalysis' => TsrAnalysis::count(),
                    'total' => Tsr::where('status_id',3)->count()
                ];
            break;
            case 'recap':
                return $this->recap($request);
            break;
            case 'target':
                return $this->target($request);
            break;
        }   
    }

    public function counts($request){
        return [
            $this->requests($request),
            // $this->customers($request),
            $this->unpaid($request),
            $this->income($request),
        ];
    }

    public function requests($request){
        $array = [];
        $data = Tsr::selectRaw('YEAR(created_at) AS x, COUNT(*) AS y')
        ->where('status_id', 3)->groupBy('x')->orderBy('x', 'asc') ->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Requests',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Requests',
            'icon' => 'ri-hand-coin-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => Tsr::where('status_id',3)->count(),
        ];
    }

    public function customers($request){
        $array = [];
        $data = Tsr::selectRaw('YEAR(created_at) AS x, COUNT(customer_id) AS y')
        ->where('status_id', 3)->groupBy('x')->orderBy('x', 'asc') ->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Customer Served',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Customer Served',
            'icon' => 'ri-group-2-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => Tsr::where('status_id',3)->distinct('customer_id')->count(),
        ];
    }

    public function income($request){
        $array = [];
        $data = TsrPayment::selectRaw('YEAR(paid_at) AS x, SUM(total) AS y')
        ->whereHas('tsr',function ($query){
            $query->where('status_id',3);
        })->where('is_paid',1)->groupBy('x')->orderBy('x', 'asc')->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Income',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Income',
            'icon' => 'ri-secure-payment-fill',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => '₱'.number_format(TsrPayment::whereHas('tsr',function ($query){
                $query->where('status_id',3);
            })->where('is_paid',1)->sum('total'),2,".",","),
        ];
    }

    public function unpaid($request){
        $array = [];
        $data = TsrPayment::selectRaw('YEAR(paid_at) AS x, SUM(total) AS y')
        ->whereHas('tsr',function ($query){
            $query->where('status_id',3);
        })->where('is_paid',0)->groupBy('x')->orderBy('x', 'asc')->get();
        $len = count($data);
        
        $arr = [
            'name' => 'Income',
            'data' => $data
        ];
        array_push($array,$arr);

        return $arr = [
            'name' => 'Unpaid',
            'icon' => 'ri-safe-2-line',
            'color' => 'danger',
            'series' => $array,
            'number' => ($len != 0 && $len != 1) ? $d = $data[$len-1]['y']-$data[$len-2]['y'] : 0,
            'percent' => ($len != 0 && $len != 1) ? round($d/$data[$len-1]['y']*100) : 0,
            'total' => '₱'.number_format(TsrPayment::whereHas('tsr',function ($query){
                $query->where('status_id',3);
            })->where('is_paid',0)->sum('total'),2,".",","),
        ];
    }

    public function recap($request){
        $current_year = $request->year; $years = []; 
        $laboratory = $request->laboratory;

        $programs = [
            ['name' => 'Value of Transactions', 'value' => 1],
            ['name' => 'Not yet Collected', 'value' => 0],
        ];
        $prog = []; 
        foreach($programs as $program){
            $data = []; $year = $current_year - 20;
            for($year; $year <= $current_year; $year++){
                $years[] = $year; $p = $program['value'];
                $data[] = TsrPayment::whereHas('tsr',function ($query) use ($year){
                    $query->where('status_id',3)->whereYear('created_at',$year);
                })
                ->when($request->laboratory, function ($query, $laboratory) {
                    $query->whereHas('tsr',function ($query) use ($laboratory){
                        $query->where('laboratory_id', $laboratory);
                    });
                })
                ->where('is_paid',$p)->sum('total');
            }
            $arr[] = [
                'name' => $program['name'],
                'data' => $data  
            ];
            
        }

        return $y =[
            'categories' => $years,
            'lists' => $arr
        ];
    }

    public function target($request){
        $targets =  Target::where('year',$request->year)->where('is_lab',1)->get();
        foreach($targets as $target){

        }
        return [
            'target' => $targets,
        ];
    }

    public function topcustomers($request){
        $sort = $request->sort;
        $year = $request->year;
        $data = Customer::with('customer_name')->withCount(['tsrs' => function ($query) use ($year){
            $query->where('status_id', 3)->whereYear('created_at',$year);
        }])
        ->orderBy('tsrs_count', $sort)->take(5)->get();
        return CustomerTopResource::collection($data);
    }

    public function toptestnames($request){
        $sort = $request->sort;
        $year = $request->year;
        $data = TsrAnalysis::whereHas('sample',function ($query) use ($year){
            $query->whereHas('tsr',function ($query) use ($year){
                $query->where('status_id',3)->whereYear('created_at',$year);
            });
        })
        ->join('list_testservices', 'tsr_analyses.testservice_id', '=', 'list_testservices.id')
        ->join('list_names', 'list_testservices.testname_id', '=', 'list_names.id')
        ->select('list_names.name', \DB::raw('COUNT(*) as count'))
        ->groupBy('list_testservices.testname_id')
        ->orderBy('count', $sort)->take(5)->get();
        return TestnameTopResource::collection($data);
    }
}
