<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class GetMenuByOrderIdService
{
    public static function getMenuByOrderId($id)
    {
        return MenuRepository::getMenuByOrderId($id);
    }
}
