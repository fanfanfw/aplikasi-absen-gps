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
    size: A4 landscape;
    margin: 10mm;
  }
  #tittle{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
    font-weight: bold;
  }

  .tablepresensi{
    width: 100%;
    font-size: 12px
    margin-top: 10px;
    border-collapse: collapse;
    font-family: Arial, Helvetica, sans-serif;
  }
  .tablepresensi tr th{
    border: 1px solid black;
    padding: 8px;
    background-color: rgb(190, 190, 190);
    font-size: 10px;
  }
  .tablepresensi td{
    border: 1px solid black;
    padding: 5px;
    font-size: 10px;
  }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4 landscape">



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
                    REKAP PRESENSI KARYAWAN <br>
                    PERIODE {{ strtoupper($namabulan[$bulan]) }} - {{ $tahun }}<br>
                    PT. ROODOLPH DETIK ABADI <br></span>
                    <span><i>Jl. Raya Hantap No 04, Babakan Surabaya, Kiaracondong, Kota Bandung</i></span>
            </td>
        </tr>
    </table>

    <table class="tablepresensi">
      <tr>
        <th rowspan="2">NIK</th>
        <th rowspan="2">Nama Karyawan</th>
        <th colspan="31">Tanggal</th>
        <th rowspan="2">Total Hadir</th>
        <th rowspan="2">Total Terlambat</th>
      </tr>
      <tr>
      <?php
        for($i=1; $i<=31; $i++){
        ?>
        <th>{{ $i }}</th>
        <?php
        }
        ?>
      </tr>
      @foreach ($rekap as $d )
      <tr>
        <td>{{ $d->nik }}</td>
        <td>{{ $d->nama_lengkap }}</td>
        
        <?php
        $totalhadir = 0;
        $totaltelat = 0;
        for($i=1; $i<=31; $i++){
          $tgl = "tgl_".$i;
          if(empty($d->$tgl)){
            $hadir = ['', ''];
            $totalhadir += 0;
          }else{
            $hadir = explode("-",$d->$tgl);
            $totalhadir += 1;
            if($hadir[0] > "07:00:00"){
              $totaltelat += 1;
            }
          }
        ?>
        <td>
          <span style="color:{{ $hadir[0]>"07:00:00" ? "red" : "" }}">{{ $hadir[0] }}</span>
          <span style="color:{{ $hadir[1]>"16:00:00" ? "red" : "" }}">{{ $hadir[1] }}</span>
        </td>
        <?php
        }
        ?>
        <td>{{ $totalhadir }}</td>
      </tr>
      @endforeach
    </table>
    
    <table width="100%" style="margin-top: 100px;">
      <tr>
        <td></td>
        <td style="text-align:center;"> Bandung, {{ date('d-m-Y') }}</td>
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