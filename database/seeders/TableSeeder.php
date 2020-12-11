<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'Экран 1',
                'created_at' => now()
            ],
            [
                'title' => 'Экран 2',
                'created_at' => now()
            ],
            [
                'title' => 'Экран 3',
                'created_at' => now()
            ],
            [
                'title' => 'Стена 1',
                'created_at' => now()
            ],
            [
                'title' => 'Стена 2',
                'created_at' => now()
            ],
            [
                'title' => 'Стена 3',
                'created_at' => now()
            ],
        ];
        DB::table('tables')->insert($data);

    }
}
