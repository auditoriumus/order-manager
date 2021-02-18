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
        $menu = Menu::find($id);
        $menu->stock = json_decode($menu->stock, JSON_OBJECT_AS_ARRAY);
        return $menu;
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
        $menu->stock = json_encode($data['stock'], JSON_FORCE_OBJECT);
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
        $menuItem->stock = json_encode($data['stock'], JSON_FORCE_OBJECT);
        return $menuItem->update();
    }
}
