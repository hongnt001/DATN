<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devices;
use App\Models\Category;
use App\Models\Venue;
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
            $v['locate'] = Venue::where('id',$v['locate_id'])->first()->name;
        }

        $devices->setData($devices->original);

        return $devices;
    }


//    public function create(Request $request){
//        if($request->isMethod('post')){
//            $this->validate( $request, [
//                'name' => 'required|min:6|max:255',
//                'email' => 'required|email|max:255|unique:users',
//                'password' => 'required|min:6|confirmed:password_confirmation',
//                'password_confirmation' => 'required|min:6'
//            ]);
//            $user = User::create($request->only(['email', 'name']));
//            $user->password = bcrypt( $request->get('password'));
//            $user->save();
//            return redirect()->route( 'backend.datatable.index', ['data' => 'users']);
//        }
//
//        return view('');
//    }
}
