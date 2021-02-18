<?php


namespace App\Repositories\Stocks;


use App\Models\Stock;

class StockReposytory
{
    public static function getAllItems()
    {
        return Stock::all();
    }
}
