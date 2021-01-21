<?php


namespace App\Services\Orders;


use App\Repositories\Orders\OrderRepository;

class ChangeDescriptionService
{
    public static function changeDescription($id, $description)
    {
        return OrderRepository::changeDescription($id, $description);
    }
}
