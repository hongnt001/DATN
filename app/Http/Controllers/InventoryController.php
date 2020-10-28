<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory_group;
use App\Models\Inventory_report;
use App\Models\Inventory;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    public function showFormCreatGroup(){
        $users = User::select('id','full_name')->get();

        return view('decision',['users'=> $users ]);
    }

    public function createGroup(Request $request){
        $this->validator($request->all())->validate();

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tv_2' => ['different:tv1'],
            'tv_3' =>  ['different:tv1','different:tv2'],
            'tv_4' =>  ['different:tv1','different:tv2','different:tv3'],
            'tv_5' =>  ['different:tv1','different:tv2','different:tv3','different:tv4'],
            'tv_6' =>  ['different:tv1','different:tv2','different:tv3','different:tv4','different:tv5'],
        ]);
    }
}
