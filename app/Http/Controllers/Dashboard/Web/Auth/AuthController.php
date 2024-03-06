<?php

namespace App\Http\Controllers\Dashboard\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //get dashbaord login view

     public function loginView(){
        return view('Dashboard.auth.login');
     }
     public function lgoinMethod(Request $request){
        $request->validate([
            'email'=>['required','exists:admins,email'],
            'password'=>['required'],
        ]);

        if(!Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('dashboard.login.view')->with('failed','عفوا فشل في تسجيل الدخول');
        }
        return redirect()->to('dashboard')->with('success','مرحبا بك عزيزي المسؤل');
     }

     public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login.view')->with('success','مرحبا بك عزيزي المسؤل');

     }
}