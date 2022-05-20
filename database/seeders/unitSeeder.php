<?php

namespace Database\Seeders;

use App\Models\unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class unitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            [
                'kode_unit'=>'IT',
                'nama_unit'=>'ITRS'
            ],
            [
                'kode_unit'=>'IPS',
                'nama_unit'=>'IPSRS'
            ],
            [
                'kode_unit'=>'Rad',
                'nama_unit'=>'Radiologi'
            ]
        ];

        foreach ($unit as $key => $value) {
            unit::create($value);
        }
    }
}
