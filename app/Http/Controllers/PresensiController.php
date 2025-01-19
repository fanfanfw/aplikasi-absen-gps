<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function create()
    {
        return view("presensi.create");
    }
}
