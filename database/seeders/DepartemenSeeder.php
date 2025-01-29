<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departemen")->insert([
        [   
            'kode_dept' => 'MKT',
            'nama_dept' => 'Marketing'
        ],
        [   
            'kode_dept' => 'HRD',
            'nama_dept' => 'Human Resource Development'
        ],
        [   
            'kode_dept' => 'IT',
            'nama_dept' => 'Information Technology'
        ],
        ]);
    }
}
