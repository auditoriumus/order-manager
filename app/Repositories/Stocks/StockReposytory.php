<?php


namespace App\Repositories\Stocks;


use App\Models\Stock;

class StockReposytory
{
    public static function getAllItems()
    {
        return Stock::all();
    }

    public static function addNewStockItem(array $data)
    {
        $stock = new Stock();
        $stock->title = $data['title'];
        $stock->measure_unit = $data['measure_unit'];
        $stock->count = $data['count'];
        $stock->per_price = $data['per_price'];
        $stock->total_price = $data['total_price'];
        return $stock->save();
    }

    public static function destroyStockItem($id)
    {
        return Stock::destroy($id);
    }

    public static function getStockById($id)
    {
        return Stock::find($id);
    }

    public static function updateStockItemById($id, array $data)
    {
        $stock = Stock::find($id);
        $stock->title = $data['title'];
        $stock->measure_unit = $data['measure_unit'];
        $stock->count = $data['count'];
        $stock->per_price = $data['per_price'];
        $stock->total_price = $data['total_price'];
        return $stock->update();
    }

    public static function destroyStockItemById($id)
    {
        return Stock::destroy($id);
    }
}
