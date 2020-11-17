<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Devices;


class UserController extends Controller
{
    public function getList(){
        $users = User::all();
        return view('user/list-user', ['users' => $users,'active' => 'listuser']);
    }
    public function showRegistrationForm()
    {
        return view('user/create-user',['active' => 'adduser'] );
    }
    public function create(Request $request){
        $this->validator($request->all())->validate();
        $user = new User();

        $user->full_name = $request->name;
        $user->position = $request->position;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->phone = $request->phone;

        $user->save();
        return redirect('/user/list');

    }

    public function getInfor(){
        $user = Auth::user();
        return view('user/infor-user', ['user' => $user,'active' => 'listuser']);
    }

    public function editInfor(Request $request){
        $user = Auth::user();
        $user->full_name = $request->name;
        $user->position = $request->position;
        $user->email = $request->email;
        $user->department = $request->department;
        $user->role_id = $request->role;
        $user->phone = $request->phone;
        $user->save();

        $hashedPassword = Auth::user()->password;

        if (\Hash::check($request->oldpassword , $hashedPassword )) {

            if (!\Hash::check($request->newpassword , $hashedPassword)) {
                if($request->password == $request->confirm_pass){
                    $user->password = bcrypt($request->newpassword);
                    $user->save();
                }
            }
            else{
                session()->flash('message','Mật khẩu mới cần khác mật khẩu cũ!');
            }
        }
        else{
            session()->flash('message','Nhập chưa đúng mật khẩu cũ');
        }
        return redirect('/user/list');

    }



    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => [ 'string','min:3', 'max:191'],
            'email' => [ 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'same:confirm_pass'],
        ]);
    }
}
