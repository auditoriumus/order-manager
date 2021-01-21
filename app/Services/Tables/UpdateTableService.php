<?php


namespace App\Services\Tables;


use App\Repositories\Tables\TableRepository;

class UpdateTableService
{
    public static function updateTable($id, $data)
    {
        return TableRepository::updateTable($id, $data);
    }
}
