<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venue;
use App\Models\Devices;
use App\Models\Inventory_group;
use App\Models\Inventory_report;
use App\Models\Inventory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function showFormCreatGroup(){
        $active = 'decision';
        $users = User::select('id','full_name')->get();
        $venues = Venue::select('id','name')->orderBy('name', 'asc')->get();

        return view('decision',['users'=> $users, 'venues' => $venues, 'active_create' => true, 'active' =>  $active]);
    }

    public function createGroup(Request $request){
        if(empty($request->tv_4)){
            $this->validator3($request->all())->validate();

            //Create Inventory
            $inventory = new Inventory();
            $inventory->id_user = Auth::id();
            $inventory->date_inventory = $request->date;
            $inventory->time_inventory = $request->time;
            $inventory->locate = serialize($request->locations);
            $inventory->status = 'start';

            $saved_1 = $inventory->save();

            if(!$saved_1){
                App::abort(500, 'Error');
            }

            //Create Group
            $inventory_group_1 = new Inventory_group();
            $inventory_group_1->id_inventory = $inventory->id;
            $inventory_group_1->id_user = $request->tv_1;
            $inventory_group_1->position_inventory = $request->p_1;
            $inventory_group_1->save();

            $inventory_group_2 = new Inventory_group();
            $inventory_group_2->id_inventory = $inventory->id;
            $inventory_group_2->id_user = $request->tv_2;
            $inventory_group_2->position_inventory = $request->p_2;
            $inventory_group_2->save();

            $inventory_group_3 = new Inventory_group();
            $inventory_group_3->id_inventory = $inventory->id;
            $inventory_group_3->id_user = $request->tv_3;
            $inventory_group_3->position_inventory = $request->p_3;
            $inventory_group_3->save();

            //Create Report

            $report = new Inventory_report();
            $report->id_inventory = $inventory->id;
            $report->save();


        }
        if(empty($request->tv_5)){
            $this->validator4($request->all())->validate();
        }
        if(empty($request->tv_6)){
            $this->validator5($request->all())->validate();
        }


        return view('inventory',['active'=>'inventory']);

    }

    protected function createdMember($number, $id_inventory){

    }

    protected function validator6(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
            'tv_4' => ['different:tv_1','different:tv_2','different:tv_3'],
            'tv_5' => ['different:tv_1','different:tv_2','different:tv_3','different:tv_4'],
            'tv_6' => ['different:tv_1','different:tv_2','different:tv_3','different:tv_4','different:tv_5'],
        ]);
    }
    protected function validator5(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
            'tv_4' => ['different:tv_1','different:tv_2','different:tv_3'],
            'tv_5' => ['different:tv_1','different:tv_2','different:tv_3','different:tv_4'],
        ]);
    }
    protected function validator4(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
            'tv_4' => ['different:tv_1','different:tv_2','different:tv_3'],
        ]);
    }
    protected function validator3(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv_1'],
            'tv_3' => ['different:tv_1','different:tv_2'],
        ]);
    }

    public function getList(){
        $inventories = Inventory::all();
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
            foreach ($group as $tv){
                array_push($array_mem, $tv->user->full_name);
            }
            $inventory->group = $array_mem;
        }

        return view('inventory',['inventories'=>$inventories, 'active' =>  'inven']);
    }


    public function invenActive(Request $request){
        $devices = Devices::paginate(3);

       $id = $request->id_inventory;
       dd($id);
       $inventory = Inventory::select('*')->where('id',$id);


//        $inventory->user = $inventory->user->full_name;
        $inventory->locate = unserialize($inventory->locate);
        $array_locate = [];
        foreach ($inventory->locate as $id_venue){
            $venue = Venue::where('id', $id_venue)->first();
            array_push($array_locate, $venue->name);
        }
        $inventory->locate = $array_locate;

        $group = $inventory->group;
        $array_mem = [];
        foreach ($group as $tv){
            array_push($array_mem, $tv->user->full_name);
        }
        $inventory->group = $array_mem;

        return view('active',['inventory'=>$inventory,'devices'=>$devices, 'active' =>  'inven']);
    }
}
