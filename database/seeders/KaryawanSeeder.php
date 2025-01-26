<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Karyawan::create([
            'nik' => '12345',
            'nama_lengkap' => 'Admin Karyawan',
            'jabatan' => 'Manager',
            'no_hp' => '081234567890',
            'password' => '12345', // Akan otomatis ter-hash oleh mutator
            'remember_token' => null,
        ]);

        Karyawan::create([
            'nik' => '12346',
            'nama_lengkap' => 'Fan Fan Firgiawan',
            'jabatan' => 'Head of IT',
            'no_hp' => '089525521887',
            'password' => '12346', // Akan otomatis ter-hash oleh mutator
            'remember_token' => null,
        ]);
    }
}
