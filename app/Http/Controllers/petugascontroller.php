<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\models\pengaduan;

class petugascontroller extends Controller
{
    

    function index(){
        $pengaduan = DB::table("pengaduan")->get();
        return view ("home_petugas",["pengaduan" => $pengaduan]);
    }

    function tambah_petugas(){
        return view('register_petugas');
    }

    function proses_petugas(request $request){
        $isi_id = $request->id;
        $isi_nama = $request->nama;
        $isi_username = $request->username;
        $isi_password = $request->password;
        $isi_telp = $request->telp;
        $isi_level = $request->level;

        DB::table('petugas')->insert([
            'id' => $isi_id,
            'nama_petugas' =>$isi_nama,
            'username' =>$isi_username,
            'password' =>hash::make($isi_password),
            'telp' =>$isi_telp,
            'level' =>"petugas"

        ]);
        return redirect('/login_petugas');

    }
    function tanggapan($id){
    $tanggapan = DB::table('tanggapan')->where('id_pengaduan','=', $id)->frist();

    return view('tanggapan',["tanggapan" => $tanggapan]);
    }
    function proses_tanggapan(request $request, $id){
        $isi_tanggapan = $request->tanggapan;
        $pengaduan_id = $request->id_pengaduan;

        DB::table('tanggapan')->insert([
            'id_pengaduan' => $id,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $isi_tanggapan,
            'id_petugas' => Auth::guard("petugas")->user()->id,
        ]);
        return redirect ('/home_petugas');
    }
    function detail(){
        $pengaduan = DB::table('pengaduan')->get();
        return view('detail_petugas',['pengaduan' => $pengaduan]);
    }
    function hapus($id){
        DB::table('pengaduan')->where('id_pengaduan', '=' ,$id)->delete();
        return redirect('/home_petugas');
    }
    function proses_status(request $request, $id){
        $status = $request->status;
        DB::table('pengaduan')->where('id_pengaduan',$request->id)->update(['status' => $request->status]);
        return redirect('/home_petugas');
    }


}