<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(Request $request){
        if($request->isMethod('post')){
            $this->validate( $request, [
                'name' => 'required|min:6|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed:password_confirmation',
                'password_confirmation' => 'required|min:6'
            ]);
            $user = Users::create($request->only(['email', 'name']));
            $user->password = bcrypt( $request->get('password'));
            $user->save();
            return redirect()->route( 'backend.datatable.index', ['data' => 'users']);
        }

        return view('');
    }
}
