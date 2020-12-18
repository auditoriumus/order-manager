<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class TotalPriceFromOrderService
{
    public static function countTotalPriceFromOrderById($id)
    {
        if (is_int($id)) {
            $order = OrderRepository::findOrderBuId($id);
            $menu = $order->menu;
            $total = 0;
            foreach ($menu as $itemCost) {
                $total += $itemCost->price;
            };
            return OrderRepository::setTotalprice($order, $total);
        } elseif (is_array($id)) {
            foreach ($id as $idItem) {
                $order = OrderRepository::findOrderBuId($idItem);
                $menu = $order->menu;
                $total = 0;
                foreach ($menu as $itemCost) {
                    $total += $itemCost->price;
                };
                OrderRepository::setTotalprice($order, $total);
            }
        }
    }
}
