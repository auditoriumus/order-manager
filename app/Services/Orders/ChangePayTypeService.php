<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class ChangePayTypeService
{
    public static function changePayType($orderId, $typeId)
    {
        $order = OrderRepository::findOrderById($orderId);
        $order->paytype_id = $typeId;
        return $order->update();
    }
}
