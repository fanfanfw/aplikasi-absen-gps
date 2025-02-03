<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page 
  { 
    size: A4 
  }
  #tittle{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight: bold;
  }
  .tablekaryawan{
    margin-top: 50px;
  }
  .tablekaryawan, td{
    padding: 5px;
  }
  .tablepresensi{
    width: 100%;
    margin-top: 10px;
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
  }
  .tablepresensi tr th{
    border: 2px solid black;
    padding: 8px;
    background-color: rgb(190, 190, 190);
  }
  .tablepresensi td{
    border: 2px solid black;
    padding: 5px;
    font-size: 14px;
  }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

  @php
function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam ." Jam" . " " . round($sisamenit2) . " Menit";
        }
@endphp

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%;">
        <tr>
            <td style="width: 30px">
                <img src="{{ asset('assets/img/logo-stmik.png') }}" width="150" height="100" alt="">
            </td>
            <td>
                <span id="tittle">
                    LAPORAN PRESENSI KARYAWAN <br>
                    PERIODE {{ strtoupper($namabulan[$bulan]) }} - {{ $tahun }}<br>
                    PT. ROODOLPH DETIK ABADI <br></span>
                    <span><i>Jl. Raya Hantap No 04, Babakan Surabaya, Kiaracondong, Kota Bandung</i></span>
            </td>
        </tr>
    </table>
    <table class="tablekaryawan">
        <tr>
            <td rowspan="6">
                @php
                $path = Storage::url('uploads/karyawan/'. $karyawan->foto);
                @endphp
                <img src="{{ url($path) }}" alt="" height="200" width="200">
            </td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $karyawan->nik }}</td>
        </tr>
        <tr>
            <td>Nama Karyawan</td>
            <td>:</td>
            <td>{{ $karyawan->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>:</td>
            <td>{{ $karyawan->nama_dept }}</td>
        </tr>
        <tr>
            <td>No. Hp</td>
            <td>:</td>
            <td>{{ $karyawan->no_hp }}</td>
        </tr>
    </table>
    <table class="tablepresensi">
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Foto</th>
            <th>Jam Pulang</th>
            <th>Foto</th>
            <th>Keterangan</th>
            <th>Jumlah Jam Kerja</th>
        </tr>
        @foreach ($presensi as $d)
                @php
                $path_in = Storage::url('uploads/absensi/'. $d->foto_in);
                $path_out = Storage::url('uploads/absensi/'. $d->foto_out);

                $jam_terlambat = selisih('07:00:00', $d->jam_in);
                @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</td>
                <td>{{ $d->jam_in }}</td>
                <td><img src="{{ url($path_in) }}" alt="" width="60" height="60"></td>
                <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>
                <td>
                  @if ($d->jam_out != null)
                  <img src="{{ url($path_out) }}" alt="" width="60" height="60">
                  @else
                  <img src="{{ asset('assets/img/noPhoto.png') }}" alt="">
                  @endif
                </td>
                <td>
                    @if ($d->jam_in > '07:00:00')
                        Terlambat {{ $jam_terlambat }}
                    @else
                        Tepat Waktu
                    @endif
                </td>
                <td>
                  @if ($d->jam_out != null)
                    @php
                    $jmljamkerja = selisih($d->jam_in, $d->jam_out);
                    @endphp
                  @else
                    @php
                  
                    $jmljamkerja = 0;
                    @endphp
                  @endif
                  {{ $jmljamkerja }}
                </td>
            </tr>
        @endforeach
    </table>
    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td colspan="2" style="text-align:right;"> Bandung, {{ date('d-m-Y') }}</td>
      </tr>
      <tr>
        <td style="text-align: center; vertical-align: bottom;" height="100px">
          <u>Farayaka Aqila</u><br>
          <i><b>HRD Manager</b></i>
        </td>
        <td style="text-align: center; vertical-align: bottom;">
          <u>Fatih Aqlan</u><br>
          <i><b>Direktur</b></i>
        </td>
      </tr>
    </table>
  </section>

</body>

</html>