<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'kode_jabatan'=>'ka',
                'nama_jabatan'=>'Kasi'
            ],
            [
                'kode_jabatan'=>'kab',
                'nama_jabatan'=>'Kabag'
            ],
            [
                'kode_jabatan'=>'dir',
                'nama_jabatan'=>'Direktur'
            ]
        ];

        foreach ($jabatan as $key => $value) {
            Jabatan::create($value);
        }
    }
}
