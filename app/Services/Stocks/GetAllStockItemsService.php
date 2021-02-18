<?php


namespace App\Services\Stocks;


use App\Repositories\Stocks\StockReposytory;

class GetAllStockItemsService
{
    public static function getAllStockItems()
    {
        return StockReposytory::getAllItems();
    }
}
