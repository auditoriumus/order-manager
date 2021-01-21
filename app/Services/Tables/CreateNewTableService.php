<?php


namespace App\Services\Tables;


use App\Repositories\Tables\TableRepository;

class CreateNewTableService
{
    public static function createNewTable($data)
    {
        return TableRepository::createNewTable($data);
    }
}
