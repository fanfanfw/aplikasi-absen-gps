@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Karyawan
          </div>
          <h2 class="page-title">
            Laporan Presensi
          </h2>
        </div>
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/presensi/cetaklaporan" target="_blank" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="bulan" id="bulan" class="form-select">
                                        <option value="">Bulan</option>
                                        @for ($i=1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ date("m") == $i ? 'selected' : '' }}>{{ $namabulan[$i] }}</option>
                                         @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="tahun" id="tahun" class="form-select">
                                        <option value="">Tahun</option>
                                        @php
                                            $tahunmulai = 2022;
                                            $tahunsekarang = date("Y")
                                        @endphp
                                        @for ($tahun=$tahunmulai; $tahun<= $tahunsekarang; $tahun++)
                                            <option value="{{ $tahun }}" {{ date("Y") == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <select name="nik" id="nik" class="form-select">
                                        <option value="">Pilih Karyawan</option>
                                        @foreach ($karyawan as $d )
                                            <option value="{{ $d->nik }}">{{ $d->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" name="cetak" class="btn btn-primary w-100" >
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                                        Cetak
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" name="exportexcel" class="btn btn-success w-100" >
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 -0.5 16 16" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" id="Download--Streamline-Lucide" height="16" width="16"><desc>Download Streamline Icon: https://streamlinehq.com</desc><path d="M13.125 9.375v2.5a1.25 1.25 0 0 1 -1.25 1.25H3.125a1.25 1.25 0 0 1 -1.25 -1.25v-2.5" stroke-width="1"></path><path d="m4.375 6.25 3.125 3.125 3.125 -3.125" stroke-width="1"></path><path d="m7.5 9.375 0 -7.5" stroke-width="1"></path></svg>
                                        Export to Excel
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection