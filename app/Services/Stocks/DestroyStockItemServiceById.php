<?php

namespace App\Services\Stocks;

use App\Repositories\Stocks\StockReposytory;

class DestroyStockItemServiceById
{
    public static function destroyStockItemByIdService($id)
    {
        return StockReposytory::destroyStockItemById($id);
    }
}
