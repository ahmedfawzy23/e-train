<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function do_login(Request $request){

        $data = $request->validate([
            'email' => "required|email",
            'password' => "required|string",
        ]);

        if(!auth()->guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            return back();
        } else {

            return view('admin.index');
        }
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return view('admin.login');
    }
}
