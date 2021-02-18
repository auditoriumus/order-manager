<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockSeeder extends Seeder
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
              'title' => 'Табак',
              'measure_unit' => 'гр',
              'count' => 250,
              'per_price' => 800,
              'total_price' => 800
          ],
            [
                'title' => 'Виски',
                'measure_unit' => 'гр',
                'count' => 0.7,
                'per_price' => 1300,
                'total_price' => 1300
            ]
        ];

        DB::table('stocks')->insert($data);
    }
}
