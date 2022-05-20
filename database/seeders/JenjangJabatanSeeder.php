<?php

namespace Database\Seeders;

use App\Models\JenjangJabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenjang = [
            [
                'kode_jenjang'=>'-',
                'nama_jenjang'=>'-',
                'tunjangan'=>'0',
                'index'=>'0'
            ],
            [
                'kode_jenjang'=>'I,5',
                'nama_jenjang'=>'PJ',
                'tunjangan'=>'170000',
                'index'=>'2'
            ],
            [
                'kode_jenjang'=>'II',
                'nama_jenjang'=>'KOORDINATOR',
                'tunjangan'=>'240000',
                'index'=>'2'
            ],
            [
                'kode_jenjang'=>'III',
                'nama_jenjang'=>'KARU',
                'tunjangan'=>'300000',
                'index'=>'3'
            ],
            [
                'kode_jenjang'=>'III,5',
                'nama_jenjang'=>'SUB KARU',
                'tunjangan'=>'400000',
                'index'=>'3'
            ],
            [
                'kode_jenjang'=>'IV',
                'nama_jenjang'=>'KEPALA SUB BAGIAN',
                'tunjangan'=>'600000',
                'index'=>'4'
            ],
            [
                'kode_jenjang'=>'V',
                'nama_jenjang'=>'KABAG/KABID',
                'tunjangan'=>'720000',
                'index'=>'6'
            ],
            [
                'kode_jenjang'=>'Vb',
                'nama_jenjang'=>'KOMITE',
                'tunjangan'=>'600000',
                'index'=>'6'
            ],
            [
                'kode_jenjang'=>'VI',
                'nama_jenjang'=>'DIREKTUR',
                'tunjangan'=>'2400000',
                'index'=>'9'
            ]
        ];

        foreach ($jenjang as $key => $value) {
            JenjangJabatan::create($value);
        }
    }
    
}
