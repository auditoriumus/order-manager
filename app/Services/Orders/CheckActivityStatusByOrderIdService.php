<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class CheckActivityStatusByOrderIdService
{
    public static function checkPaymentStatusByOrderId($id)
    {
        return OrderRepository::findOrderById($id)->payment_status;
    }
}
