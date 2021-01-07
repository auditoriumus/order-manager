<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;
use App\Repositories\Orders\OrderRepository;

class ChangeMenuService
{
    public static function changeMenuByOrderId(int $orderId, int $menuItemId, bool $flag = true)
    {
        $menuItemTitle = MenuRepository::findMenuItemById($menuItemId)->title;
        $menuItemPrice = MenuRepository::findMenuItemById($menuItemId)->price;
        $order = OrderRepository::findOrderById($orderId);

        //создаем временную копию меню заказа
        $tmpMenu = $order->menu;
        $tmpMenu = (array) $tmpMenu;

        $menuTitleList = [];
        foreach ($tmpMenu as $tmpMenuItem) {
            $menuTitleList[] = $tmpMenuItem->good;
        }

        if (in_array($menuItemId, $menuTitleList)) {
            foreach ($tmpMenu as $tmpMenuItem) {
                if ($tmpMenuItem->good == $menuItemId) {
                    $tmpMenuItem->count += 1;
                    $tmpMenuItem->price += $menuItemPrice;
                }
            }
        }  else {
            $tmpMenu[] = [
                'good' => $menuItemId,
                'count' => 1,
                'price' => $menuItemPrice,
                'title' => $menuItemTitle,
            ];
        }

        $tmpMenu =(object) $tmpMenu;

        //переносим временную копию в основной закза
        $order->menu = $tmpMenu;
        $order->update();

        return $order->menu;
    }
}
