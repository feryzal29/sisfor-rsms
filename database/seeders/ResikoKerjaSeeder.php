<?php

namespace Database\Seeders;

use App\Models\ResikoKerja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResikoKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resiko = [
            [
                'kode_resiko'=>'-',
                'nama_resiko'=>'-',
                'index'=>'0'
            ],
            [
                'kode_resiko'=>'R2',
                'nama_resiko'=>'Resiko Kerja Kimiawi,Rajal,Gizi,IPS,Rajal, Driver, Logistik, Satpam, IT, Farmasi',
                'index'=>'2'
            ],
            [
                'kode_resiko'=>'R3',
                'nama_resiko'=>'Resiko Kontaminasi, RI, Lab, VK',
                'index'=>'3'
            ],
            [
                'kode_resiko'=>'R4',
                'nama_resiko'=>'Resiko Infeksius, IBS, IGD, ICU, HCU, RIK, Loundry, Radiologi, Ipal',
                'index'=>'4'
            ],
            [
                'kode_resiko'=>'RI',
                'nama_resiko'=>'Karyawan Perkantoran/tidak melayani px langsung',
                'index'=>'1'
            ],
        ];

        foreach ($resiko as $key => $value) {
            ResikoKerja::create($value);
        }
    }
}
