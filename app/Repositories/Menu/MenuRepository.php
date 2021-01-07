<?php


namespace App\Repositories\Menu;


use App\Models\Menu;
use App\Models\Order;

class MenuRepository
{
    public static function getMenuByCategoryId($id)
    {
        return Menu::where('category_id', $id)->get();
    }

    public static function getMenuByOrderId($id)
    {
        return Order::find($id)->menu;
    }

    public static function findMenuItemById($id) {
        return Menu::find($id);
    }
}
