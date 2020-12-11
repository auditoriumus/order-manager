<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Юрий',
            'email' => 'um_2005@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty'), // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'level' => 1,
        ];

        DB::table('users')->insert($data);
    }
}
