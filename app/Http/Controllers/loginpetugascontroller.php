<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class loginpetugascontroller extends Controller
{
    function login(){
        return view('login');
    }
    
    function proses_login(request $request){
        $data = $request->only('username','password');
        if(auth::attempt($data)){
           //echo "berhasil";
           return redirect('/home');
        }else{
           // echo "gagal";
            return redirect('/login');
        }
    }
    
}
