
@if ($histori->isEmpty())
    <div class="aler alert-outline-warning">
        <p>Data Belum Ada</p>
    </div>
@endif
@foreach ($histori as $d)
    <ul class="listview image-listview">
        <li>
            <div class="item">
                @php
                    $path = Storage::url('uploads/absensi/'.$d->foto_in);
                @endphp
                <img src="{{ url($path) }}" alt="image" class="image">
                <div class="in">
                    <div>
                        <b>{{ date("d-m-Y", strtotime($d->tgl_presensi)) }}</b><br>
                    </div>
                    <span class="badeg {{ $d->jam_in < "07:00" ? 'bg-success' : 'bg-danger' }}">
                        {{ $d->jam_in }}
                    </span>
                    <span class="badge bg-primary">{{ $d->jam_out }}</span>
                </div>
            </div>
        </li>
    </ul>
@endforeach