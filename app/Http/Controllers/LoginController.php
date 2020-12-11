<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('Auth/login');
        }
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        else  {
            return view('Auth/login', ['error' => 'Email hoặc Password không chính xác']);
        }

    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

    public function forgotPassword(){
        return view('Auth/forgot-pass');
    }
}
