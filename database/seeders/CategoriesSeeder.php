<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
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
                'title' => 'Кальяны'
            ],
            [
                'title' => 'Холодные напитки'
            ],
            [
                'title' => 'Горячие напитки'
            ],
            [
                'title' => 'Алкогольные напитки'
            ],
            [
                'title' => 'Закуски'
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
