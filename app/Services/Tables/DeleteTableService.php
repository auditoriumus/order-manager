<?php


namespace App\Services\Tables;


use App\Repositories\Orders\OrderRepository;
use App\Repositories\Tables\TableRepository;
use function PHPUnit\Framework\isNull;

class DeleteTableService
{
    public static function deleteTable($id)
    {
        if (sizeof(OrderRepository::findOrderByTableId($id)) > 0) return false;
        return TableRepository::deleteTable($id);
    }
}
