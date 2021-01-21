<?php


namespace App\Repositories\Tables;


use App\Models\Table;

class TableRepository
{
    public static function getAllTables()
    {
        return Table::all();
    }

    public static function findTableById($id)
    {
        return Table::findOrFail($id);
    }

    public static function updateTable($id, $data)
    {
        $table = Table::find($id);
        $table->title = $data['title'];
        return $table->update();
    }

    public static function createNewTable($data)
    {
        $table = new Table();
        $table->title = $data['title'];
        return $table->save();
    }

    public static function deleteTable($id)
    {
        return Table::destroy($id);
    }
}
