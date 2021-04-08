<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockRequest;
use App\Services\Stocks\DestroyStockItemServiceById;
use App\Services\Stocks\AddNewStockItemService;
use App\Services\Stocks\GetAllStockItemsService;
use App\Services\Stocks\GetStockByIdService;
use App\Services\Stocks\UpdateStockItemByIdService;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;

class StockControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockList = GetAllStockItemsService::getAllStockItems();
        View::share([
            'stockList' => $stockList
        ]);
        return view('stock.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        AddNewStockItemService::addNewStockItem($request->all());
        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentStock = GetStockByIdService::getStockById($id);
        View::share([
            'currentStock' => $currentStock
        ]);
        return view('stock.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStockRequest $request, $id)
    {
        $data = $request->all();
        UpdateStockItemByIdService::updateStockItemById($id, $data);
        return redirect()->route('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DestroyStockItemServiceById::destroyStockItemByIdService($id);
        return redirect()->route('stock.index');
    }

    /**
     * API
     * @return \App\Models\Stock[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getStockList()
    {
        return GetAllStockItemsService::getAllStockItems();
    }
}
