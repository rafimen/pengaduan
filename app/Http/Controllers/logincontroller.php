<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class logincontroller extends Controller
{
    function register(){
        return view('register');
    }
    
    function proses_register(request $request){

        $nik = $request ->nik;
        $nama = $request ->nama;
        $username = $request ->username;
        $password = $request ->password;
        $telp = $request ->telp;
    
      $masyarakat = DB::table('masyarakat')->insert([
            'nik' => $nik,
            'nama' => $nama,
            'username' => $username,
            'password' => hash::make($password),
            'telp' => $telp
    
        ]);
        return redirect('/login');
    }

    function login(){
        return view('login');
    }
    
    function proses_login(request $request){
        $data = $request->only('username','password');
        if(auth::attempt($data)){
           //echo "berhasil";
          return redirect('/home');
        }else{
            //echo "gagal";
            return redirect('/login');
        }
    }
    
}


