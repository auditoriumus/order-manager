<?php


namespace App\Repositories\Orders;


use App\Models\Order;

class OrderRepository
{
    public static function getAllOrders()
    {
        return Order::all();
    }

}
