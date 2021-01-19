<?php


namespace App\Repositories\Paytypes;


use App\Models\Paytype;

class PayTypeRepository
{
    public static function getAllPayTypes()
    {
        return Paytype::all();
    }
}
