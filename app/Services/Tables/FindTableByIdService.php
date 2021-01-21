<?php


namespace App\Services\Tables;


use App\Repositories\Tables\TableRepository;

class FindTableByIdService
{
    public static function findTableById($id)
    {
        return TableRepository::findTableById($id);
    }
}
