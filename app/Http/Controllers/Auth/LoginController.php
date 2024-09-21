<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
        return view('Auth.login');
    }
    public function doLogin(Request $request){
        $crediantials=$request->except('_token');
        $auth=Auth::attempt($crediantials);
        if ($auth){
            return redirect('/roles');
        }
        return redirect('/login')->with('error','Username or password invalid');
    }
    public function logout(){
        Auth::logout();
//        return redirect()->back('/login');
    }
}
