<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //User::factory(100)->create();
        //$this->call(TableSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(CategoriesSeeder::class);
        //$this->call(MenuSeeder::class);
        $this->call(PaytypesSeeder::class);
        //$this->call(OrderSeeder::class);
        $this->call(StockSeeder::class);
    }
}
