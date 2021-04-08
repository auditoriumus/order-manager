<?php

namespace App\Services\Stocks;

use App\Repositories\Stocks\StockReposytory;

class AddNewStockItemService
{
    public static function addNewStockItem(array $data)
    {
        StockReposytory::addNewStockItem($data);
    }
}
