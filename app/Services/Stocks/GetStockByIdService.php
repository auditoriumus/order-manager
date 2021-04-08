<?php


namespace App\Services\Stocks;


use App\Repositories\Stocks\StockReposytory;

class GetStockByIdService
{
    public static function getStockById($id)
    {
        return StockReposytory::getStockById($id);
    }
}
