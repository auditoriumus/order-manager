<?php


namespace App\Services\Tables;


use App\Repositories\Tables\TableRepository;

class GetAllTablesService
{
    public static function getAllTables()
    {
        return TableRepository::getAllTables();
    }
}
