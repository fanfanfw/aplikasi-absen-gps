<?php

namespace Database\Seeders;

use App\Models\PengajuanIzin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;


class PengajuanIzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PengajuanIzin::create([
            'nik' => '12345',
            'tgl_izin' => '2025-01-25',
            'status' => 'i',
            'keterangan' => 'Izin untuk acara keluarga',
            'status_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12345',
            'tgl_izin' => '2025-01-24',
            'status' => 'i',
            'keterangan' => 'Izin untuk acara keluarga',
            'status_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12345',
            'tgl_izin' => '2025-01-23',
            'status' => 's',
            'keterangan' => 'Izin untuk acara keluarga',
            'status_approved' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12345',
            'tgl_izin' => '2025-01-26',
            'status' => 'i',
            'keterangan' => 'Menjenguk Sodara sakit',
            'status_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12345',
            'tgl_izin' => '2025-01-28',
            'status' => 's',
            'keterangan' => 'sakit hati sama atasan',
            'status_approved' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12346',
            'tgl_izin' => '2025-01-23',
            'status' => 's',
            'keterangan' => 'Izin untuk acara keluarga',
            'status_approved' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12346',
            'tgl_izin' => '2025-01-26',
            'status' => 'i',
            'keterangan' => 'Menjenguk Sodara sakit',
            'status_approved' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        PengajuanIzin::create([
            'nik' => '12346',
            'tgl_izin' => '2025-01-28',
            'status' => 's',
            'keterangan' => 'sakit hati sama atasan',
            'status_approved' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
