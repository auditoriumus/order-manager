<?php

namespace App\Http\Controllers;

use App\Services\Orders\TotalPriceFromOrderService;
use App\Services\Paytypes\GetAllPayTypesService;
use Illuminate\Http\Request;
use App\Services\Orders\GetAllOrdersService;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //получение id всех заказов
        $ids = GetAllOrdersService::getAllOrders(true);

        //получение и установка общей суммы заказа
        TotalPriceFromOrderService::countTotalPriceFromOrderById($ids);

        View::share([
            'orders' => GetAllOrdersService::getAllOrders(),
            'paytypes' => GetAllPayTypesService::getAllPayTypes(),
        ]);

        return view('welcome');
    }
}
