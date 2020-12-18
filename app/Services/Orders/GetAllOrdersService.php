<?php

namespace App\Services\Orders;

use App\Repositories\Orders\OrderRepository;

class GetAllOrdersService
{
    public static function getAllOrders(bool $idList = false)
    {
        if ($idList) {
            $ordersArray = OrderRepository::getAllOrders()->toArray();
            foreach ($ordersArray as $order) {
                $ids[] = $order['id'];
            }
            return $ids;
        }
        return OrderRepository::getAllOrders();
    }
}
