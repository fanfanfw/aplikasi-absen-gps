<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presensi')->insert([
            [
                'nik' => '12345',
                'tgl_presensi' => '2025-01-25',
                'jam_in' => '08:00:00',
                'jam_out' => '17:00:00',
                'foto_in' => '12345-2025-01-25-in.png',
                'foto_out' => '12345-2025-01-25-out.png',
                'lokasi_in' => '-6.9074944,107.6035584',
                'lokasi_out' => '-6.9074944,107.6035584',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '12345',
                'tgl_presensi' => '2025-01-26',
                'jam_in' => '08:00:00',
                'jam_out' => '17:00:00',
                'foto_in' => '12345-2025-01-26-in.png',
                'foto_out' => '12345-2025-01-26-out.png',
                'lokasi_in' => '-6.9074944,107.6035584',
                'lokasi_out' => '-6.9074944,107.6035584',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
