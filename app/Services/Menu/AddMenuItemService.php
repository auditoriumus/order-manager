<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;
use App\Services\Categories\GetCategoryByIdService;

class AddMenuItemService
{
    public static function addMenuItem($data)
    {
        $data = ConversionStockMenuService::conversionStockMenu($data);
        GetCategoryByIdService::getCategoryById($data['category']);
        return MenuRepository::addMenuItem($data);
    }
}
