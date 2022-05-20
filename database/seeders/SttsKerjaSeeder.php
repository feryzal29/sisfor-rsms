<?php

namespace Database\Seeders;

use App\Models\SttsKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SttsKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kerja = [
            [
                'stts'=>'-',
                'kategori'=>'-'
            ],
            [
                'stts'=>'CT',
                'kategori'=>'Calon Pegawai Tetap'
            ],
            [
                'stts'=>'FT',
                'kategori'=>'Kontrak, Full Time'
            ],
            [
                'stts'=>'kos',
                'kategori'=>'-'
            ],
            [
                'stts'=>'KV',
                'kategori'=>'Kontrak Evaluasi'
            ],
            [
                'stts'=>'Or',
                'kategori'=>'Orientasi'
            ],
            [
                'stts'=>'PT',
                'kategori'=>'Part Time'
            ],
            [
                'stts'=>'T',
                'kategori'=>'Tetap'
            ],
        ];

        foreach ($kerja as $key => $value) {
            SttsKerja::create($value);
        }
    }
}
