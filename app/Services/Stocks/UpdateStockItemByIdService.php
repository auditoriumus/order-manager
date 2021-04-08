<?php


namespace App\Services\Stocks;


use App\Repositories\Stocks\StockReposytory;

class UpdateStockItemByIdService
{
    public static function updateStockItemById($id, $data)
    {
        StockReposytory::updateStockItemById($id, $data);
    }
}
