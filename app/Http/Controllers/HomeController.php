<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devices;
use App\Models\Category;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;


class HomeController extends Controller
{
    public function toHome(){
        return view('home',[ 'active' =>'home']);
    }
    public function getListDevices(){
        $builder = Devices::all();
        $devices =  DataTables::of($builder)->toJson();
        foreach($devices->original['data'] as $k => &$v) {
            $v['stt'] = $k + 1;
            $v['category'] = Category::where('id',$v['category_id'])->first()->category_name;
            $v['locate'] = Venue::where('id',$v['locate_id'])->first()->venue_name;
        }

        $devices->setData($devices->original);

        return $devices;
    }
    public function getDeviceType(){
        $devices = DB::table('devices')
            ->select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->get();
        $types = Category::all();
        foreach ($devices as &$device){
            foreach ($types as $type){
                if($device->category_id == $type->id ){
                    $device->type_name = $type->category_name;
                    break;
                }
            }
        }
        return $devices;
    }
    public function getStatus(){
        $devices = DB::table('devices')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        return $devices;
    }
}
