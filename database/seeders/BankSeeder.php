<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            [
                'nama'=>'-'
            ],
            [
                'nama'=>'Bank Jatim'
            ],
            [
                'nama'=>'BPD'
            ],
            [
                'nama'=>'MANDIRI'
            ],
            [
                'nama'=>'T'
            ],
        ];

        foreach ($bank as $key => $value) {
            Bank::create($value);
        }
    }
}
