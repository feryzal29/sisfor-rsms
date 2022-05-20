<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pendidikan = [
            [
                'tingkat'=>'-',
                'index'=>'0',
                'gapok1'=>'0',
                'kenaikan'=>'0',
                'maksimal'=>'0'
            ],
            [
                'tingkat'=>'D1/D2/sederajat',
                'index'=>'4',
                'gapok1'=>'770000',
                'kenaikan'=>'770000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'D3/Sederajat',
                'index'=>'5',
                'gapok1'=>'780000',
                'kenaikan'=>'45000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 Apoteker',
                'index'=>'7',
                'gapok1'=>'900000',
                'kenaikan'=>'80000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 Dokter Gigi',
                'index'=>'7',
                'gapok1'=>'950000',
                'kenaikan'=>'90000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 Dokter Umum',
                'index'=>'7',
                'gapok1'=>'1000000',
                'kenaikan'=>'100000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 KEBIDANAN',
                'index'=>'7',
                'gapok1'=>'800000',
                'kenaikan'=>'50000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 Keperawatan',
                'index'=>'7',
                'gapok1'=>'800000',
                'kenaikan'=>'50000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S1 Umum/D4',
                'index'=>'6',
                'gapok1'=>'790000',
                'kenaikan'=>'450000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S2',
                'index'=>'8',
                'gapok1'=>'1100000',
                'kenaikan'=>'1100000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S2 Spesialis',
                'index'=>'9',
                'gapok1'=>'1200000',
                'kenaikan'=>'120000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'S3',
                'index'=>'10',
                'gapok1'=>'1300000',
                'kenaikan'=>'130000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'SD',
                'index'=>'1',
                'gapok1'=>'650000',
                'kenaikan'=>'35000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'SLTA/Sederajat',
                'index'=>'3',
                'gapok1'=>'760000',
                'kenaikan'=>'43000',
                'maksimal'=>'10'
            ],
            [
                'tingkat'=>'SLTP/Sederajat',
                'index'=>'2',
                'gapok1'=>'700000',
                'kenaikan'=>'400000',
                'maksimal'=>'10'
            ],
            
        ];

        foreach ($pendidikan as $key => $value) {
            Pendidikan::create($value);
        }
    }
}
