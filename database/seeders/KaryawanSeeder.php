<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        // Pastikan folder storage tersedia
        if (!Storage::exists('public/uploads/karyawan')) {
            Storage::makeDirectory('public/uploads/karyawan');
        }

        // Daftar gambar yang ada
        $images = [
            'dummy1.jpg' => '12345.jpg',
            'dummy2.jpg' => '12346.jpg',
        ];

        // Salin gambar ke storage dengan nama NIK.ekstensi
        foreach ($images as $source => $newName) {
            $sourcePath = public_path("img-seed/karyawan/{$source}");
            $destinationPath = storage_path("app/public/uploads/karyawan/{$newName}");

            if (File::exists($sourcePath) && !File::exists($destinationPath)) {
                File::copy($sourcePath, $destinationPath);
            }
        }

        // Buat data karyawan dengan nama file yang sudah diubah
        Karyawan::create([
            'nik' => '12345',
            'nama_lengkap' => 'Admin Karyawan',
            'jabatan' => 'Manager HRD',
            'no_hp' => '081234567890',
            'password' => '12345', // Hash password
            'kode_dept' => 'HRD',
            'foto' => '12345.jpg', // Nama file sesuai NIK
            'remember_token' => null,
        ]);

        Karyawan::create([
            'nik' => '12346',
            'nama_lengkap' => 'Fan Fan Firgiawan',
            'jabatan' => 'Head of IT',
            'no_hp' => '089525521887',
            'password' => '12346', // Hash password
            'kode_dept' => 'IT',
            'remember_token' => null,
        ]);
        Karyawan::create([
            'nik' => '12347',
            'nama_lengkap' => 'Kiana',
            'jabatan' => 'Finnance',
            'no_hp' => '085624850907',
            'password' => '12346', // Hash password
            'kode_dept' => 'FIN',
            'remember_token' => null,
        ]);
    }
}
