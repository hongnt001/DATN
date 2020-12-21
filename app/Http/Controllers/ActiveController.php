<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Inventory_detail;
use App\Models\Devices;
use App\Models\Accounting;
use App\Models\Venue;
use App\Models\Inventory_group;
use App\Models\Inventory_report;



class ActiveController extends Controller
{

    public function inventoryDetail(Request $request){
        $inven_detail = Inventory_detail::where('id_inventory', $request->id_inventory)
            ->where('id_device','=',$request->id_device)->first();
        $inven_detail->number_device = $request->number_device;
        $inven_detail->acc_price = (int)filter_var($request->acc_present_price, FILTER_SANITIZE_NUMBER_INT);
        $inven_detail->original_price = (int)filter_var($request->original_price, FILTER_SANITIZE_NUMBER_INT);
        $inven_detail->present_price = (int)filter_var($request->present_price, FILTER_SANITIZE_NUMBER_INT);
        $inven_detail->status = $request->status;
        $inven_detail->notes = $request->notes;

        $inven_detail->save();
    }

    public function inventoryEnd(Request $request){
        $id = $request->id_inventory;
        $inventory = Inventory::where('id',$id)->first();
        $inventory->status = 'Chờ đánh giá tổng kết';
        $inventory->save();


        $inventory->locate = array_map(function($id){
            return (int)$id;
        }, unserialize($inventory->locate));

        $devices = Devices::whereIn('locate_id',$inventory->locate)->get();

        $array_locate = [];
        foreach ($inventory->locate as $id_venue){
            $venue = Venue::where('id', $id_venue)->first();
            array_push($array_locate, $venue->venue_name);
        }
        $inventory->locate = $array_locate;

        $group = $inventory->group;
        $array_mem = [];
        foreach ($group as $tv){
            array_push($array_mem, $tv->user->full_name.' - '.$tv->position_inventory);
        }
        $inventory->date_inventory = Carbon::createFromFormat('Y-m-d',$inventory->date_inventory)->format('d/m/Y');
        $inventory->group = $array_mem;

        $report = Inventory_report::where('id_inventory', $inventory->id)->first();

        $inventory->comment = ($report == null)?'':$report->comments;
        $inventory->note = ($report == null)?'':$report->notes;

        foreach($devices as $device){
            $device_inven_detail = Inventory_detail::where('id_inventory',$id)->where('id_device', $device->id)->first();
            $device->number_device = $device_inven_detail->number_device;
            $device->original_price = (int)$device_inven_detail->original_price;
            $device->present_price = (int)$device_inven_detail->present_price;
            $device->status = $device_inven_detail->status;
            $device->notes = $device_inven_detail->notes;
            $device->save();
        }


        $total_acc_original_price = 0;
        $total_acc_present_price = 0;
        $total_original_price = 0;
        $total_present_price = 0;
        $total_cl_original_price = 0;
        $total_cl_present_price = 0;
            foreach ($devices as $key =>&$device){
                $devices->stt = $key + 1;
                $device->locate = Venue::where('id',$device->locate_id)->first()->venue_name;

                $acc = Accounting::where('id_device',$device->id)->first();
                $device->acc_number_device = $acc->number_device;
                $device->acc_original_price = $acc->original_price;

                $device_inven_detail = Inventory_detail::where('id_inventory',$id)->where('id_device', $device->id)->first();
                $device->acc_present_price = (int)$device_inven_detail->acc_price;
                $device->cl_number_device = $device->acc_number_device - $device->number_device;
                $device->cl_original_price = $device->acc_original_price - $device->original_price;
                $device->cl_present_price = $device->acc_present_price - $device->present_price;

                $total_acc_original_price = $total_acc_original_price + $device->acc_original_price;
                $total_acc_present_price = $total_acc_present_price + $device->acc_present_price;
                $total_original_price = $total_original_price + $device->original_price;
                $total_present_price = $total_present_price + $device->present_price;
                $total_cl_original_price = $total_cl_original_price + $device->cl_original_price;
                $total_cl_present_price =  $total_cl_present_price + $device->cl_present_price;

            }
        return view('comment',['inventory'=>$inventory,
            'devices'=>$devices,
            'active' =>  'rate',
            'total_acc_original_price'=>$total_acc_original_price,
            'total_acc_present_price'=>$total_acc_present_price,
            'total_original_price'=>$total_original_price,
            'total_present_price'=>$total_present_price,
            'total_cl_original_price'=>$total_cl_original_price,
            'total_cl_present_price'=>$total_cl_present_price,
        ]);




    }

}
