<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;
use App\Repositories\Tables\TableRepository;

class ChangeTableService
{
    public static function changeTable($id, $tableId)
    {
        $table = TableRepository::findTableById($tableId);
        return OrderRepository::changeTable($id, $table);
    }
}
