<?php

namespace Database\Seeders;

use App\Models\SttsWp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SttsWpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wp = [
            [
                'stts'=>'-',
                'kategori'=>'-'
            ],
            [
                'stts'=>'K/0',
                'kategori'=>'WP Kawin'
            ],
            [
                'stts'=>'K/1',
                'kategori'=>'Tambahan WP Kawin dg. 1 anak'
            ],
            [
                'stts'=>'K/2',
                'kategori'=>'Tambahan WP Kawin dg. 2 anak'
            ],
            [
                'stts'=>'K/3',
                'kategori'=>'Tambahan WP Kawin dg. 3 anak'
            ],
            [
                'stts'=>'TK/0',
                'kategori'=>'WP Tidak Kawin'
            ],
            [
                'stts'=>'TK/1',
                'kategori'=>'WP Tidak Kawin dg. 1 Tanggungan'
            ],
            [
                'stts'=>'TK/2',
                'kategori'=>'WP Tidak Kawin dg. 2 Tanggungan'
            ],
            [
                'stts'=>'TK/3',
                'kategori'=>'WP Tidak Kawin dg. 3 Tanggungan'
            ],
        ];

        foreach ($wp as $key => $value) {
            SttsWp::create($value);
        }
    }
}
