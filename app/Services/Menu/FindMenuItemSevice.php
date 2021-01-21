<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class FindMenuItemSevice
{
    public static function findMenuItem($id)
    {
        return MenuRepository::findMenuItemById($id);
    }
}
