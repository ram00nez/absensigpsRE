<?php

use App\Http\Controllers\Absensicontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonfigurasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest:karyawan'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/proseslogin', [AuthController::class,'proseslogin']);
});

Route::middleware(['guest:user'])->group(function (){
    Route::get('/panel', function () {
        return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin',[AuthController::class, 'prosesloginadmin']);
});

Route::middleware(['auth:karyawan'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/proseslogout', [AuthController::class,'proseslogout']);

    //absensi
    Route::get('absensi/create',[Absensicontroller::class,'create']);

    //ambilfoto
    Route::post('/absensi/store',[AbsensiController::class, 'store']);

    //editprofile
    Route::get('/editprofile',[AbsensiController::class,'editprofile']);
    Route::post('/absensi/{nik}/updateprofile', [AbsensiController::class, 'updateprofile']);

    //history
    Route::get('/absensi/history',[AbsensiController::class, 'history']);
    Route::post('/gethistory',[AbsensiController::class,'gethistory']);

    //izin
    Route::get('/absensi/izin',[AbsensiController::class, 'izin']);
    Route::get('/absensi/buatizin',[AbsensiController::class,'buatizin']);
    Route::post('/absensi/storeizin',[AbsensiController::class,'storeizin']);
    Route::post('/absensi/cekpengajuanizin', [AbsensiController::class, 'cekpengajuanizin']);
});

Route::middleware(['auth:user'])->group(function ()
{
    Route::get('/proseslogoutadmin',[AuthController::class, 'proseslogoutadmin']);
    Route::get('/panel/dashboardadmin',[DashboardController::class,'dashboardadmin']);

    //indexin karyawan
    Route::get('/karyawan',[KaryawanController::class,'index']);
    Route::post('/karyawan/store',[KaryawanController::class,'store']);
    Route::post('/karyawan/edit',[KaryawanController::class,'edit']);
    Route::post('/karyawan/{nik}/update',[KaryawanController::class,'update']);
    Route::post('/karyawan/{nik}/delete',[KaryawanController::class,'delete']);

    //Departemen
    Route::get('/departemen',[DepartemenController::class,'index']);
    Route::post('/departemen/store',[DepartemenController::class,'store']);
    Route::post('/departemen/edit',[DepartemenController::class,'edit']);
    Route::post('/departemen/{kode_dept}/update',[DepartemenController::class,'update']);
    Route::post('/departemen/{kode_dept}/delete',[DepartemenController::class,'delete']);


    //absensi
    Route::get('/absensi/monitoring',[AbsensiController::class, 'monitoring']);
    Route::post('/getabsensi',[AbsensiController::class, 'getabsensi']);
    Route::get('/absensi/laporan', [AbsensiController::class, 'laporan']);
    Route::post('/absensi/cetaklaporan', [AbsensiController::class, 'cetaklaporan']);
    Route::get('/absensi/rekap', [AbsensiController::class, 'rekap']);
    Route::post('/absensi/cetakrekap', [AbsensiController::class, 'cetakrekap']);
    Route::get('/absensi/izinsakit', [AbsensiController::class, 'izinsakit']);
    Route::post('/absensi/approveizinsakit', [AbsensiController::class, 'approveizinsakit']);
    Route::get('/absensi/{id}/batalkanizinsakit', [AbsensiController::class, 'batalkanizinsakit']);

    //showmap
    Route::post('/tampilkanpeta',[AbsensiController::class, 'tampilkanpeta']);

     //Konfigurasi

     Route::get('/konfigurasi/lokasikantor', [KonfigurasiController::class, 'lokasikantor']);
     Route::post('/konfigurasi/updatelokasikantor', [KonfigurasiController::class, 'updatelokasikantor']);
    
});