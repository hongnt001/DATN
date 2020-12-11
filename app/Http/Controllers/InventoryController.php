<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venue;
use App\Models\Devices;
use App\Models\Inventory_group;
use App\Models\Inventory_report;
use App\Models\Inventory_detail;
use App\Models\Inventory;
use App\Models\Accounting;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class InventoryController extends Controller
{
    public function showFormCreatGroup(){
        $active = 'decision';
        $users = User::select('id','full_name')->get();
        $venues = Venue::select('id','venue_name')
                ->orderBy('venue_name', 'asc')->get();
        return view('decision',['users'=> $users, 'venues' => $venues, 'active_create' => true, 'active' =>  $active]);
    }

    public function createGroup(Request $request){
        if(empty($request->tv_4)){
            $this->validator3($request->all())->validate();
            $id_inven = $this->createdKeyMember($request);
            if($id_inven == 0){
                return back()->withInput()->withErrors(['message1'=>'Lỗi khi lưu. Thử lại!']);
            }
        } else if(empty($request->tv_5)){
            $this->validator4($request->all())->validate();
            $id_inven = $this->createdKeyMember($request);
            if($id_inven == 0){
                return back()->withInput()->withErrors(['message1'=>'Lỗi khi lưu. Thử lại!']);
            }

            $inventory_group_4 = new Inventory_group();
            $inventory_group_4->id_inventory = $id_inven;
            $inventory_group_4->id_user = $request->tv_4;
            $inventory_group_4->position_inventory = $request->p_4;
            $inventory_group_4->save();
        }
        else {
            $this->validator5($request->all())->validate();
            $id_inven = $this->createdKeyMember($request);
            if($id_inven == 0){
                return back()->withInput()->withErrors(['message1'=>'Lỗi khi lưu. Thử lại!']);
            }

            $inventory_group_4 = new Inventory_group();
            $inventory_group_4->id_inventory = $id_inven;
            $inventory_group_4->id_user = $request->tv_4;
            $inventory_group_4->position_inventory = $request->p_4;
            $inventory_group_4->save();

            $inventory_group_5 = new Inventory_group();
            $inventory_group_5->id_inventory = $id_inven;
            $inventory_group_5->id_user = $request->tv_5;
            $inventory_group_5->position_inventory = $request->p_5;
            $inventory_group_5->save();
        }

        return redirect()->route('get_list_inven');

    }

    protected function createdKeyMember($request){
        //Create Inventory
        $inventory = new Inventory();
        $inventory->id_user = Auth::id();
        $inventory->date_inventory = $request->date;
        $inventory->reason = empty($request->reason)?'':$request->reason;
        $inventory->time_inventory = $request->time;
        $inventory->locate = serialize($request->locations);
        $inventory->status = 'Đưa quyết định';
        $saved_1 = $inventory->save();

        //Create Report

        $report = new Inventory_report();
        $report->id_inventory = $inventory->id;
        $saved_2 = $report->save();

        //Create Group
        $inventory_group_1 = new Inventory_group();
        $inventory_group_1->id_inventory = $inventory->id;
        $inventory_group_1->id_user = $request->tv_1;
        $inventory_group_1->position_inventory = $request->p_1;
        $saved_3 = $inventory_group_1->save();

        $inventory_group_2 = new Inventory_group();
        $inventory_group_2->id_inventory = $inventory->id;
        $inventory_group_2->id_user = $request->tv_2;
        $inventory_group_2->position_inventory = $request->p_2;
        $saved_4  = $inventory_group_2->save();

        $inventory_group_3 = new Inventory_group();
        $inventory_group_3->id_inventory = $inventory->id;
        $inventory_group_3->id_user = $request->tv_3;
        $inventory_group_3->position_inventory = $request->p_3;
        $saved_5 = $inventory_group_3->save();

        if($saved_1&&$saved_2&&$saved_3&&$saved_4&&$saved_5){
            return $inventory->id;
        } else return 0;

    }

    protected function validator5(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
            'tv_4' => ['different:tv_1','different:tv_2','different:tv_3'],
            'tv_5' => ['different:tv_1','different:tv_2','different:tv_3','different:tv_4'],
        ],
            [
               'different'=>'2 thành viên hội đồng :attribute và :other trùng nhau'
            ]);
    }
    protected function validator4(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
            'tv_4' => ['different:tv_1','different:tv_2','different:tv_3'],
        ],
            [
                'different'=>'2 thành viên hội đồng :attribute và :other trùng nhau'
            ]);
    }
    protected function validator3(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
        ],
            [
                'different'=>'2 thành viên hội đồng :attribute và :other trùng nhau'
            ]);
    }

    public function getList(){
        $inventories = Inventory::orderBy('date_inventory', 'desc')->get();
        foreach($inventories as $inventory){
            $inventory->user = $inventory->user->full_name;
            $inventory->locate = unserialize($inventory->locate);
            $array_locate = [];
            foreach ($inventory->locate as $id_venue){
                $venue = Venue::where('id', $id_venue)->first();
                array_push($array_locate, $venue->name);
            }
            $inventory->locate = $array_locate;

            $group = $inventory->group;
            $array_mem = [];
            $inventory->member = false;
            foreach ($group as $tv){
                if($tv->user->id == Auth::id()){
                    $inventory->member = true;
                }
                array_push($array_mem, $tv->user->full_name.' - '.$tv->position_inventory);
            }
            $inventory->date_inventory = Carbon::createFromFormat('Y-m-d',$inventory->date_inventory)->format('d/m/Y');
            $inventory->group = $array_mem;
        }


        return view('inventory',[
            'inventories'=>$inventories,
            'active' =>  'inven',
            ]);
    }


    public function invenActive(Request $request){
       $id = $request->id_inventory;
       $inventory = Inventory::where('id',$id)->first();


        $inventory->name = $inventory->user->full_name;
        $inventory->locate = array_map(function($id){
            return (int)$id;
        }, unserialize($inventory->locate));

        $devices = Devices::whereIn('locate_id',$inventory->locate)->get();

        $array_locate = [];
        foreach ($inventory->locate as $id_venue){
            $venue = Venue::where('id', $id_venue)->first();
            array_push($array_locate, $venue->name);
        }
        $inventory->locate = $array_locate;

        $group = $inventory->group;
        $array_mem = [];
        foreach ($group as $tv){
            array_push($array_mem, $tv->user->full_name.' - '.$tv->position_inventory);
        }
        $inventory->date_inventory = Carbon::createFromFormat('Y-m-d',$inventory->date_inventory)->format('d/m/Y');
        $inventory->group = $array_mem;

        $inven_detail = Inventory_detail::where('id_inventory',$id)->get();

        if(count($inven_detail) == 0){
            foreach ($devices as $key =>&$device){
                $detail = new Inventory_detail();
                $detail->id_inventory = $inventory->id;
                $detail->id_device = $device->id;
                $detail->save();

                $devices->stt = $key+1;
                $acc = Accounting::where('id_device',$device->id)->first();
                $device->acc_number_device = $acc->number_device;
                $device->acc_original_price = $acc->original_price;
                $device->acc_present_price = $acc->present_price;
                $device->notes = ' ';
            }
        } else {
            foreach ($devices as $key =>&$device){
                $devices->stt = $key+1;
                $acc = Accounting::where('id_device',$device->id)->first();
                $device->acc_number_device = $acc->number_device;
                $device->acc_original_price = $acc->original_price;

                $device_inven_detail = Inventory_detail::where('id_inventory',$id)->where('id_device', $device->id)->first();
                $device->acc_present_price = (int)$device_inven_detail->acc_price;
                $device->number_device = $device_inven_detail->number_device;
                $device->original_price = (int)$device_inven_detail->original_price;
                $device->present_price = (int)$device_inven_detail->present_price;
                $device->status = $device_inven_detail->status;
                $device->notes = $device_inven_detail->notes;

            }
        }

        $categories = Category::all();

        $status = config('define.status');

        return view('active',['inventory'=>$inventory,
            'devices'=>$devices,
            'active' =>  'inven',
            'cate' =>  $categories,
            'status'=>$status]);
    }
}
