<?php


namespace App\Repositories\Orders;

use App\Models\Order;

class OrderRepository
{
    public static function getAllOrders()
    {
        return Order::with(['user', 'table'])->get();
    }

    public static function findOrderById($id)
    {
        return Order::findOrFail($id);
    }

    public static function setTotalprice(Order $order, int $price)
    {
        $order->total = $price;
        return $order->save();
    }

    public static function deleteOrderById($id)
    {
        return Order::destroy($id);
    }
}
