<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'admin',
                'email'=>'admin@app.com',
                'password'=>Hash::make('123456')
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
