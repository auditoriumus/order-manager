<?php


namespace App\Services\Menu;


use App\Repositories\Menu\MenuRepository;

class ConversionStockMenuService
{
    public static function conversionStockMenu($data)
    {
        //принимаем все составляющие меню и их количество
        $stockItems = $data['stock'];
        $stockItemsCount = $data['stock-count'];

        //создаем массив, в котором ключи - это категория товаров со склада, а значения - их количество
        $conversionStockMenuCallback = function ($a, $b) {
            return [$a => $b];
        };
        $allStockItemsArray = array_map($conversionStockMenuCallback, $stockItems, $stockItemsCount);

        //массив, для хранения пары категория_склада => количество
        $resultArray = [];
        foreach ($allStockItemsArray as $ItemsArray) {
            foreach ($ItemsArray as $key => $value) {
                //если количество товара со склада = 0, удаляем из списка составных товаров
                if ($value == 0) {
                    unset($ItemsArray[$key]);
                    continue;
                }
                //если в массиве $resultArray нет значения с к данным клбчом, добавляем. Если есть - увеличиваем на значение количества
                if (!key_exists($key, $resultArray)) {
                    $resultArray[$key] = +$value;
                } else {
                    $resultArray[$key] += $value;
                }
            }
        }

        //переписываем значени составляющего меню и удаляем количество
        $data['stock'] = $resultArray;
        unset($data['stock-count']);

        return $data;
    }
}
