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

    public static function getAllMenu()
    {
        return Menu::with('category')->get();
    }

    public static function addMenuItem(array $data)
    {
        $menu = new Menu();
        $menu->title = $data['title'];
        $menu->price = $data['price'];
        $menu->category_id = $data['category'];
        try {
            return $menu->save();
        } catch (\Exception $e) {
            return $e->getCode();
        }
    }

    public static function deleteMenuItemById($id)
    {
        return Menu::destroy($id);
    }

    public static function updateMenuItem($id, $data)
    {
        $menuItem = Menu::find($id);
        $menuItem->title = $data['title'];
        $menuItem->price = $data['price'];
        $menuItem->category_id = $data['category_id'];
        return $menuItem->update();
    }
}
