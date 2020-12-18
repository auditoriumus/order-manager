<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class DeleteOrderService
{
    public static function deleteOrderById(int $id)
    {
        return OrderRepository::deleteOrderById($id);
    }
}
