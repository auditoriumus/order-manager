<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreMenuItemRequest;
use App\Services\Categories\GetAllCategoriesService;
use App\Services\Menu\AddMenuItemService;
use App\Services\Menu\DeleteMenuItemByIdService;
use App\Services\Menu\FindMenuItemSevice;
use App\Services\Menu\GetAllMenuService;
use App\Services\Menu\GetMenuByCategoryIdService;
use App\Services\Menu\UpdateMenuItemService;
use App\Services\Stocks\GetAllStockItemsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuWithCategories = GetAllCategoriesService::getAllCategories();
        View::share([
            'menuWithCategories' => $menuWithCategories
        ]);
        return view('menus.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stockItems = GetAllStockItemsService::getAllStockItems();
        $categories = GetAllCategoriesService::getAllCategories();
        View::share([
            'categories' => $categories,
            'stockItems' => $stockItems
        ]);
        return view('menus.create');
    }

    /**
     * @param StoreMenuItemRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMenuItemRequest $request)
    {
        if (AddMenuItemService::addMenuItem($request->all()) === '23000' ) {
            return redirect()
                ->route('menu.create')
                ->withErrors(['Такая позиция уже существует'])
                ->withInput();
        };
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(GetMenuByCategoryIdService::getMenuByCategoryId($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockItems = GetAllStockItemsService::getAllStockItems();
        $menuItem = FindMenuItemSevice::findMenuItem($id);
        $categories = GetAllCategoriesService::getAllCategories();
        View::share([
            'categories' => $categories,
            'menuItem' => $menuItem,
            'stockItems' => $stockItems
        ]);
        return view('menus.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        UpdateMenuItemService::updateMenuItem($id, $request->all());
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DeleteMenuItemByIdService::deleteMenuItemById($id);
        return redirect()->route('menu.index');
    }
}
