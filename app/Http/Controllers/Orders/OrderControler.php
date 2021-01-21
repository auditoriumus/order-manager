<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Services\Categories\GetAllCategoriesService;
use App\Services\Menu\ChangeMenuService;
use App\Services\Menu\GetMenuByCategoryIdService;
use App\Services\Menu\GetMenuByOrderIdService;
use App\Services\Orders\ChangeActivityStatusService;
use App\Services\Orders\ChangePayTypeService;
use App\Services\Orders\CheckActivityStatusByOrderIdService;
use App\Services\Orders\CreateNewOrderService;
use App\Services\Orders\DeleteOrderService;
use App\Services\Orders\FindOrderByIdService;
use App\Services\Tables\GetAllTablesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = GetAllTablesService::getAllTables();
        View::share([
           'tables' => $tables
        ]);
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CreateNewOrderService::createNewOrder($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode((array) GetMenuByOrderIdService::getMenuByOrderId($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = GetAllCategoriesService::getAllCategories();
        $order = FindOrderByIdService::findOrderById($id);
        View::share([
            'order' => $order,
            'categories' => $categories,
        ]);
        return view('orders.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $menuItemId = $request->input('menuItemId');
        $action = $request->input('action');

        if ( $action == 'addSelectedItem' ) {
            return json_encode(ChangeMenuService::addMenuItemByOrderId($id, $menuItemId));
        } elseif ( $action == 'deleteSelectedItem' ) {
            return json_encode(ChangeMenuService::deleteMenuItemByOrderId($id, $menuItemId));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DeleteOrderService::deleteOrderById($id);
        return redirect()->route('home');
    }

    public function payTypeEdit($orderId, $typeId)
    {
        ChangePayTypeService::changePayType($orderId, $typeId);
    }

    public function changePaymentStatus($orderId, $statusId)
    {
        return ChangeActivityStatusService::changePaymentStatus($orderId, $statusId);
    }

    public function checkPaymentStatus($orderId)
    {
        return CheckActivityStatusByOrderIdService::checkPaymentStatusByOrderId($orderId);
    }
}
