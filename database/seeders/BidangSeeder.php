<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
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
                'nama'=>'-'
            ],
            [
                'nama'=>'Keperawatan/Bid'
            ],
            [
                'nama'=>'Medis'
            ],
            [
                'nama'=>'Profkes lain'
            ],
            [
                'nama'=>'Umum'
            ],
        ];

        foreach ($jabatan as $key => $value) {
            Bidang::create($value);
        }
    }
}
