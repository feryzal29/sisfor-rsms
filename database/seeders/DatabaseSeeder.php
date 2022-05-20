<?php

namespace Database\Seeders;

use App\Models\unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            unitSeeder::class,
            JabatanSeeder::class,
            pendidikanSeeder::class,
            KelompokJabatanSeeder::class,
            JenjangJabatanSeeder::class,
            ResikoKerjaSeeder::class,
            UnitEmergencySeeder::class,
            BidangSeeder::class,
            SttsWpSeeder::class,
            SttsKerjaSeeder::class,
            BankSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
