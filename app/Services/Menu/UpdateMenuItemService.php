<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class UpdateMenuItemService
{
    public static function updateMenuItem($id, $data)
    {
        $data['category_id'] = $data['category'];
        $data = ConversionStockMenuService::conversionStockMenu($data);
        return MenuRepository::updateMenuItem($id, $data);
    }

}
