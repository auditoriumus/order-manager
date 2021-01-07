<?php

namespace Database\Seeders;

use App\Models\Menu;
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
        $menu = json_encode([
            [
                'good' => 1,
                'count' => 1,
                'price' => 800,
                'title' => Menu::find(1)->title
            ]
        ], JSON_FORCE_OBJECT);

        $data = [
            [
                'table_id' => rand(1, 6),
                'user_id' => rand(1, 100),
                'menu' => $menu,
                'created_at' => now(),
            ],
            [
                'table_id' => rand(1, 6),
                'user_id' => rand(1, 100),
                'menu' => $menu,
                'created_at' => now(),
            ],
            [
                'table_id' => rand(1, 6),
                'user_id' => rand(1, 100),
                'menu' => $menu,
                'created_at' => now(),
            ],
            [
                'table_id' => rand(1, 6),
                'user_id' => 101,
                'menu' => $menu,
                'created_at' => now(),
            ]
        ];

        DB::table('orders')->insert($data);
    }
}
