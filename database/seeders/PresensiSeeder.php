<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('presensi')->insert([
            [
                'nik' => '12345',
                'tgl_presensi' => '2025-01-25',
                'jam_in' => '08:00:00',
                'jam_out' => '17:00:00',
                'foto_in' => $faker->imageUrl(640, 480, 'people', true, 'in'), // Generate gambar random
                'foto_out' => $faker->imageUrl(640, 480, 'people', true, 'out'),
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
                'foto_in' => $faker->imageUrl(640, 480, 'people', true, 'in'), // Generate gambar random
                'foto_out' => $faker->imageUrl(640, 480, 'people', true, 'out'),
                'lokasi_in' => '-6.9074944,107.6035584',
                'lokasi_out' => '-6.9074944,107.6035584',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
