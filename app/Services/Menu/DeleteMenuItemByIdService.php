<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class DeleteMenuItemByIdService
{
    public static function deleteMenuItemById($id)
    {
        return MenuRepository::deleteMenuItemById($id);
    }
}
