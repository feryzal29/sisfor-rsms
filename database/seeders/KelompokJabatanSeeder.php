<?php

namespace Database\Seeders;

use App\Models\KelompokJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelompokJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelompok = [
            [
                'kode_kelompok'=>'-',
                'nama_kelompok'=>'-',
                'index'=>'0'
            ],
            [
                'kode_kelompok'=>'I',
                'nama_kelompok'=>'PELAKSANA',
                'index'=>'1'
            ],
            [
                'kode_kelompok'=>'II',
                'nama_kelompok'=>'KOORDINATOR',
                'index'=>'2'
            ],
            [
                'kode_kelompok'=>'III',
                'nama_kelompok'=>'KARU',
                'index'=>'3'
            ],
            [
                'kode_kelompok'=>'IV',
                'nama_kelompok'=>'KEPALA SUB BAGIAN',
                'index'=>'4'
            ],
            [
                'kode_kelompok'=>'V',
                'nama_kelompok'=>'KABAG/KABID',
                'index'=>'6'
            ],
            [
                'kode_kelompok'=>'Vb',
                'nama_kelompok'=>'KOMITE',
                'index'=>'6'
            ],
            [
                'kode_kelompok'=>'VI',
                'nama_kelompok'=>'DIREKTUR',
                'index'=>'9'
            ]
        ];

        foreach ($kelompok as $key => $value) {
            KelompokJabatan::create($value);
        }
    }
}
