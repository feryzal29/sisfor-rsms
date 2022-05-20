<?php

namespace Database\Seeders;

use App\Models\UnitEmergency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitEmergencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emergency = [
            [
                'kode'=>'-',
                'nama'=>'-',
                'index'=>'0'
            ],
            [
                'kode'=>'E1',
                'nama'=>'Darurat Kecil Perkantoran',
                'index'=>'1'
            ],
            [
                'kode'=>'E2',
                'nama'=>'Energensi sedang, Keuangan diluar perkantoran, Pendaftaran,Gizi,Loundry,Farmasi,Rajal,CSSD',
                'index'=>'2'
            ],
            [
                'kode'=>'E4',
                'nama'=>'Emergency tinggi, Ambulance, RI,Lab, Radiologi',
                'index'=>'4'
            ],
            [
                'kode'=>'E6',
                'nama'=>'Emergency sangat tinggi, IGD,IBS,HCU,ICU',
                'index'=>'6'
            ]
        ];

        foreach ($emergency as $key => $value) {
            UnitEmergency::create($value);
        }
    }
}
