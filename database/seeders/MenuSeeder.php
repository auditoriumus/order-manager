<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
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
                'title' => 'Кальян на чаше',
                'price' => 800,
                'category_id' => 1
            ],
            [
                'title' => 'Кальян на яблоке',
                'price' => 1000,
                'category_id' => 1
            ],
            [
                'title' => 'Кальян на грейпфруте',
                'price' => 1200,
                'category_id' => 1
            ],
            [
                'title' => 'Кальян на ананасе',
                'price' => 1200,
                'category_id' => 1
            ],
            [
                'title' => 'coca-cola 0.3',
                'price' => 200,
                'category_id' => 2
            ],
            [
                'title' => 'fanta 0.3',
                'price' => 200,
                'category_id' => 2
            ],
            [
                'title' => 'sprite 0.3',
                'price' => 200,
                'category_id' => 2
            ],
            [
                'title' => 'pepsi 0.3',
                'price' => 200,
                'category_id' => 2
            ],
            [
                'title' => 'Пиво',
                'price' => 300,
                'category_id' => 4
            ],
            [
                'title' => 'Сэндвич',
                'price' => 250,
                'category_id' => 5
            ]
        ];

        DB::table('menus')->insert($data);
    }
}
