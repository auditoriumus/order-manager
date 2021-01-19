<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaytypesSeeder extends Seeder
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
                'title' => 'Наличными',
            ],
            [
                'title' => 'Картой',
            ],
            [
                'title' => 'Переводом',
            ],
        ];

        DB::table('paytypes')->insert($data);
    }
}
