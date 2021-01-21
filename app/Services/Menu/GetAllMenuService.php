<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class GetAllMenuService
{
    public static function getAllMenu()
    {
        return MenuRepository::getAllMenu();
    }
}
