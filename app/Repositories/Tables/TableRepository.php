<?php


namespace App\Repositories\Tables;


use App\Models\Table;

class TableRepository
{
    public static function getAllTables()
    {
        return Table::all();
    }
}
