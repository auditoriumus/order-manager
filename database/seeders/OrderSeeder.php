<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
                'coca-cola 0.3' => 1,
                'price' => 200
            ],
            [
                'fanta 0.3' => 2,
                'price' => 400
            ],
            [
                'Кальян' => 2,
                'price' => 1600
            ]
        ];

        $data = [
            [
                'table_id' => rand(1, 6),
                'menu' => json_encode($menu)
            ],
            [
                'table_id' => rand(1, 6),
                'menu' => json_encode($menu)
            ],
            [
                'table_id' => rand(1, 6),
                'menu' => json_encode($menu)
            ],
            [
                'table_id' => 1,
                'menu' => json_encode($menu)
            ]
        ];

        DB::table('orders')->insert($data);
    }
}
