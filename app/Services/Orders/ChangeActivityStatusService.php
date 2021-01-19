<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class ChangeActivityStatusService
{
    public static function changePaymentStatus($id, $status)
    {
        $order = OrderRepository::findOrderById($id);
        $order->payment_status = $status;
        return $order->update();
    }
}
