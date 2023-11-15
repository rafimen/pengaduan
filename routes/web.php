<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pengaduancontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\loginpetugascontroller;
use App\Http\Controllers\masyarakatcontroller;
use App\Http\Controllers\petugascontroller;
use Illuminate\Support\Facades\DB;

//Route::middleware(['auth'])->group(function (){
Route::get('/home', [pengaduancontroller::class,'index']);
Route::get('/laporan', [pengaduancontroller::class,'laporan']);

Route::POST('/laporan', [pengaduancontroller::class,'proses_pengaduan']);
//});

Route::get('/detail/{id}', [pengaduancontroller::class,'detail']);
Route::get('/hapus/{id}', [pengaduancontroller::class,'hapus']);
Route::get('/update/{id}', [pengaduancontroller::class,'update']);
Route::POST('/update/{id}', [pengaduancontroller::class,'proses_update']);

Route::get('/register', [logincontroller::class,'register']);
Route::post('/register', [logincontroller::class,'proses_register']);

Route::get('/login', [logincontroller::class,'login'])->name('login');
Route::POST('/login', [logincontroller::class,'proses_login']);

Route::get('/detail/{id}', [petugascontroller::class,'detail']);
Route::get('/hapus/{id}', [petugascontroller::class,'hapus']);
Route::get('/home_petugas', [petugascontroller::class,'index']);
Route::get('/register_petugas', [petugascontroller::class,'tambah_petugas']);
Route::POST('/proses_petugas', [petugascontroller::class,'proses_petugas']);


Route::get('/login_petugas', [petugascontroller::class,'login_petugas']);
Route::POST('/login_petugas', [petugascontroller::class,'proses_login_petugas']);

Route::get('/', function () {
    return view('welcome');
});
