<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
       return view("auth.login");
    }
    function login(Request $request){
        $data = $request->only('email', 'password');

        $remember = $request->get('remember');
        if(Auth::attempt($data, $remember)){
            return redirect()->intended("/admin");
        }else{
            return redirect()->route("login.index")->withErrors(["Invalid Username and Password"]);
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route("login.index");
    }
}
