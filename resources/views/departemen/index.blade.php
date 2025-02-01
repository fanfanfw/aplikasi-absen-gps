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
            Data Departemen
          </h2>
        </div>
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      @if(Session::get('success'))
                        <div class="alert alert-success">
                          {{ Session::get('success') }}
                        </div>
                      @endif

                      @if(Session::get('warning'))
                        <div class="alert alert-warning">
                          {{ Session::get('warning') }}
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <a href="#" class="btn btn-primary" id="btnTambahDepartemen">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Tambah Data</a>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-12">
                      <form action="/departemen" method="GET">
                        <div class="row">
                          <div class="col-10">
                            <div class="form-group">
                              <input type="text" name="nama_dept" id="nama_dept" class="form-control" placeholder="Nama Departemen" value="{{ Request('nama_dept') }}">
                            </div>
                          </div>
                          
                          <div class="col-2">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                              Cari </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-12">
                      <table class="table table-border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Departemen</th>
                                <th>Nama Departemen</th>
                                <th>Aksi</th>        
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($departemen as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->kode_dept }}</td>
                                <td>{{ $d->nama_dept }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="edit btn btn-success btn-sm mr-2" kode_dept="{{ $d->kode_dept }}">
                                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                        </a>
      
                                        <form action="/departemen/{{ $d->kode_dept }}/delete" style="margin-left: 5px" method="POST">
                                        @csrf
                                        <a class="delete-confirm btn btn-danger btn-sm">
                                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>                                  
                                                                            
                                        </a>
                                      </form>
                                      </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-inputdepartemen" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-tittle">Tambah Data Departemen</h5>
      <button type="button" class="btn-class" data-bs-disnmss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="/departemen/store" method="POST" id="frmDepartemen">
            @csrf
             <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
                  </span>
                <input type="text" name="kode_dept" value="" class="form-control" id="kode_dept" placeholder="Kode Departemen">
              </div>
              </div>
             </div>

             <div class="row">
              <div class="col-12">
                <div class="input-icon mb-3">
                  <span class="input-icon-addon">
                <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </span>
                <input type="text" name="nama_dept" id="nama_dept" class="form-control" placeholder="Nama Departemen">
              </div>
              </div>
             </div>

             
             <div class="row mt-5">
              <div class="col-12">
                <div class="form-group">
                  <button class="btn btn-primary w-100">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>
                    Simpan</button>
                  <button></button>
                </div>
              </div>
             </div>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="modal modal-blur fade" id="modal-editDepartemen" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-tittle">Edit Data Departemen</h5>
      <button type="button" class="btn-class" data-bs-disnmss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadeditform">
          
      </div>
    </div>
  </div>
</div>
@endsection

@push('myscript')
<script>
  $(function(){
    $("#btnTambahDepartemen").click(function(){
      $("#modal-inputdepartemen").modal('show');
    })

    $(".edit").click(function(){
      var kode_dept = $(this).attr('kode_dept');
      $.ajax({
        type: 'POST',
        url: '/departemen/edit',
        catch: false,
        data:{
          _token:"{{ csrf_token() }}",
          kode_dept:kode_dept,
        },
        success: function(response){
          $("#loadeditform").html(response);
        }
    });
      $("#modal-editDepartemen").modal('show');
    })

  $(".delete-confirm").click(function(e){
    var form = $(this).closest('form');
    e.preventDefault();
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data karyawan akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus !'
    }).then((result) => {
      form.submit();
      Swal.fire('Deleted!', '', 'success')
    })
  });

    $("#frmKaryawan").submit(function(){
      var nik = $("#nik").val();
      var nama_lengkap = $("#nama_lengkap").val();
      var jabatan = $("#jabatan").val();
      var no_hp = $("#no_hp").val();
      var kode_dept = $("frmKaryawan").find("#kode_dept").val();
      
      if(nik == "" ){
        // alert("NIK harus diisi");
        Swal.fire({
          title: 'Warning!'
          , text: "NIK Harus Diisi !"
          , icon: 'warning'
        }).then(()=>{
          $("#nik").focus();
        });
        return false;
      }else if(nama_lengkap == ""){
        Swal.fire({
          title: 'Warning!'
          , text: "Nama Lengkap Harus Diisi !"
          , icon: 'warning'
        }).then(()=>{
          $("#nama_lengkap").focus();
        });
        return false;
      }else if(jabatan == ""){
        Swal.fire({
          title: 'Warning!'
          , text: "Jabatan Harus Diisi !"
          , icon: 'warning'
        }).then(()=>{
          $("#jabatan").focus();
        });
        return false;
      }else if(no_hp == ""){
        Swal.fire({
          title: 'Warning!'
          , text: "No Hp Harus Diisi !"
          , icon: 'warning'
        }).then(()=>{
          $("#no_hp").focus();
        });
        return false;
      }
    });
  });
</script>
@endpush