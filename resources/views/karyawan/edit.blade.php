<form action="/karyawan/{{ $karyawan->nik }}/update" method="POST" id="frmKaryawan" enctype="multipart/form-data">
    @csrf
     <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
        <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-barcode"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7v-1a2 2 0 0 1 2 -2h2" /><path d="M4 17v1a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v1" /><path d="M16 20h2a2 2 0 0 0 2 -2v-1" /><path d="M5 11h1v2h-1z" /><path d="M10 11l0 2" /><path d="M14 11h1v2h-1z" /><path d="M19 11l0 2" /></svg>
          </span>
        <input type="text" readonly name="nik" value="{{ $karyawan->nik }}" class="form-control" id="nik" placeholder="NIK">
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
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $karyawan->nama_lengkap }}" class="form-control" placeholder="Nama Lengkap">
      </div>
      </div>
     </div>

     <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
        <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-clipboard-data"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17.997 4.17a3 3 0 0 1 2.003 2.83v12a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 2.003 -2.83a4 4 0 0 0 3.997 3.83h4a4 4 0 0 0 3.98 -3.597zm-8.997 7.83a1 1 0 0 0 -1 1v4a1 1 0 0 0 2 0v-4a1 1 0 0 0 -1 -1m3 3a1 1 0 0 0 -1 1v1a1 1 0 0 0 1 1l.117 -.007a1 1 0 0 0 .883 -.993v-1a1 1 0 0 0 -1 -1m3 -1a1 1 0 0 0 -1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0 -1 -1m-1 -12a2 2 0 1 1 0 4h-4a2 2 0 1 1 0 -4z" /></svg>
      </span>
        <input type="text" name="jabatan" id="jabatan" value="{{ $karyawan->jabatan }}" class="form-control" placeholder="Jabatan">
      </div>
      </div>
     </div>

     <div class="row">
      <div class="col-12">
        <div class="input-icon mb-3">
          <span class="input-icon-addon">
        <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
          </span>
        <input type="text" name="no_hp" value="{{ $karyawan->no_hp }}" id="no_hp" class="form-control" placeholder="No hp">
      </div>
      </div>
     </div>

     <div class="row">
      <div class="col-12">
        <input type="file" name="foto" class="form-control">
        <input type="hidden"name="old_foto" value="{{ $karyawan->foto }}">
      </div>
     </div>
     <div class="row mt-2">
      <div class="col-12">
        <select name="kode_dept" id="kode_dept" class="form-select">
          <option value="">Departemen</option>
          @foreach ($departemen as $d )
          <option {{ $karyawan->kode_dept == $d->kode_dept ? 'selected' : '' }} value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
          @endforeach
        </select>
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