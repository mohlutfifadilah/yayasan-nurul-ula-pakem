<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    //
    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard')->withSuccess('Selamat datang, Admin');
        }

        return redirect("login")->with('error', 'Email atau Password salah!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
