<?php

namespace Database\Seeders;

use App\Models\MappingUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapingUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MappingUser::create([
            'users_id'=>1,
            'employees_id'=>1
        ]);
    }
}
