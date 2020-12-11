<?php

namespace App\Services\Orders;

use App\Repositories\Orders\OrderRepository;

class GetAllOrdersService
{
    public static function getAllOrders()
    {
        return OrderRepository::getAllOrders();
    }
}
