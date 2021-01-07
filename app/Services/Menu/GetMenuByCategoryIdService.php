<?php


namespace App\Services\Menu;

use App\Repositories\Menu\MenuRepository;

class GetMenuByCategoryIdService
{
    public static function getMenuByCategoryId($id)
    {
        return MenuRepository::getMenuByCategoryId($id);
    }
}
