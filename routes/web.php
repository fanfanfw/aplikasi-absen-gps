<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PresensiController;
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

Route::middleware(['guest:user'])->group(function () {
    Route::get('/panel', function () {
    return view('auth.loginadmin');
    })->name('loginadmin');
    Route::post('/prosesloginadmin', [AuthController::class,'prosesloginadmin']);
});

Route::middleware(['auth:karyawan'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::get('/proseslogout', [AuthController::class,'proseslogout']);

    Route::get('/presensi/create', [PresensiController::class,'create']);
    Route::post('/presensi/store', [PresensiController::class,'store']);

    Route::get('/editprofile', [PresensiController::class,'editprofile']);
    Route::post('/presensi/{nik}/updateprofile', [PresensiController::class,'updateprofile']);

    Route::get('/presensi/histori', [PresensiController::class,'histori']);
    Route::post('/gethistori', [PresensiController::class,'gethistori']);

    Route::get('/presensi/izin', [PresensiController::class,'izin']);
    Route::get('/presensi/buatizin', [PresensiController::class,'buatizin']);
    Route::post('/presensi/storeizin', [PresensiController::class,'storeizin']);

});



Route::middleware(['auth:user'])->group(function(){
    
    Route::get('/panel/dashboardadmin', [DashboardController::class,'dashboardadmin']);
    Route::get('/proseslogoutadmin', [AuthController::class,'proseslogoutadmin']);

    Route::get('/karyawan', [KaryawanController::class,'index']);
    Route::post('/karyawan/store', [KaryawanController::class,'store']);
    Route::post('/karyawan/edit', [KaryawanController::class,'edit']);
    Route::post('/karyawan/{nik}/update', [KaryawanController::class,'update']);
    Route::post('/karyawan/{nik}/delete', [KaryawanController::class,'delete']);


    Route::get('/departemen', [DepartemenController::class,'index']);
    Route::post('/departemen/store', [DepartemenController::class,'store']);
    Route::post('/departemen/edit', [DepartemenController::class,'edit']);
    Route::post('/departemen/{kode_dept}/update', [DepartemenController::class,'update']);
    Route::post('/departemen/{kode_dept}/delete', [DepartemenController::class,'delete']);

    Route::get('/presensi/monitoring', [PresensiController::class,'monitoring']);
    Route::post('/getpresensi', [PresensiController::class,'getpresensi']);
    Route::post('/tampilkanpeta', [PresensiController::class,'tampilkanpeta']);

}); 