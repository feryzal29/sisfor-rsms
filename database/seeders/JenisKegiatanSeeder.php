<?php

namespace Database\Seeders;

use App\Models\JenisKegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = [
            [
                'nama'=>'IHT',
                'keterangan'=>'Pelatihan IHT yang diadakan oleh RS'
            ],
            [
                'nama'=>'IKKM',
                'keterangan'=>'Kegiatan yang diadakan oleh IKKM'
            ]
           
        ];

        foreach ($jenis as $key => $value) {
            JenisKegiatan::create($value);
        }
    }
}
