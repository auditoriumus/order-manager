<?php

namespace App\Http\Controllers;

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
        View::share([
            'orders' => GetAllOrdersService::getAllOrders()
        ]);
        return view('welcome');
    }
}
