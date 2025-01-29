<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = DB::table("karyawan")->orderBy('nama_lengkap')->join('departemen', 'karyawan.kode_dept', '=', 'departemen.kode_dept')->get();
        return view("karyawan.index", compact("karyawan"));
    }
}
