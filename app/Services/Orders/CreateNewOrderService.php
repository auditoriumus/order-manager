<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class CreateNewOrderService
{
    public static function createNewOrder($data)
    {
        return OrderRepository::createNewOrder($data);
    }
}
