<?php


namespace App\Services\Paytypes;


use App\Repositories\Paytypes\PayTypeRepository;

class GetAllPayTypesService
{
    public static function getAllPayTypes()
    {
        return PayTypeRepository::getAllPayTypes();
    }

}
