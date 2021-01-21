<?php


namespace App\Services\Orders;


use App\Models\Table;
use App\Repositories\Orders\OrderRepository;

class CreateNewOrderService
{
    public static function createNewOrder($data)
    {
        if (isset($data['table'])) {
            $data['table_title'] = Table::find($data['table'])->title;
        }
        return OrderRepository::createNewOrder($data);
    }
}
