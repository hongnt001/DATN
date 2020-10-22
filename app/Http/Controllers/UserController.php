<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function getList(){
        $users = User::all();
        return view('user/list-user', ['users' => $users]);
    }
    public function showRegistrationForm()
    {
        return view('user/create-user');
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

    public function editInfor(){

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
