<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class TotalPriceFromOrderService
{
    public static function countTotalPriceFromOrderById($id)
    {
        if (is_int($id)) {
            $order = OrderRepository::findOrderById($id);
            $menu = $order->menu;
            $total = 0;
            foreach ($menu as $itemCost) {
                $total += $itemCost->price;
            };
            return OrderRepository::setTotalprice($order, $total);
        } elseif (is_array($id)) {
            foreach ($id as $idItem) {
                $order = OrderRepository::findOrderById($idItem);
                $menu = $order->menu;
                $total = 0;
                if ( !empty($menu) ) {
                    foreach ($menu as $itemCost) {
                        $total += $itemCost->price;
                    };
                } else {
                    break;
                }

                OrderRepository::setTotalprice($order, $total);
            }
        }
    }
}
