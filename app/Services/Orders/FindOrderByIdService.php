<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class FindOrderByIdService
{
    public static function findOrderById($id)
    {
        return OrderRepository::findOrderById($id);
    }
}
