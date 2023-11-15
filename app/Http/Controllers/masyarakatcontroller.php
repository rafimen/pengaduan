<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\pengaduan;

class masyarakatcontroller extends Controller
{
    function index(){

       $masyarakat = DB::table('pengaduan')->get();
       return view('home',['textjudul' => $masyarakat]);  
    }

    function proses_masyarakat(request $request){

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
        return redirect('/home_masyarakat');
    }
    
}

?>
