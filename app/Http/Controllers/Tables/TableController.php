<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Services\Tables\CreateNewTableService;
use App\Services\Tables\DeleteTableService;
use App\Services\Tables\FindTableByIdService;
use App\Services\Tables\GetAllTablesService;
use App\Services\Tables\UpdateTableService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = GetAllTablesService::getAllTables();
        View::share([
            'tables' => $tables
        ]);
        return view('tables.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CreateNewTableService::createNewTable($request->all());
        return redirect()->route('table.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tableItem = FindTableByIdService::findTableById($id);
        View::share([
           'tableItem' => $tableItem
        ]);
        return view('tables.create');
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
        UpdateTableService::updateTable($id, $request->all());
        return redirect()->route('table.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!DeleteTableService::deleteTable($id)) return redirect()->route('table.index')->withErrors('Сначала закройте заказ на этом столе');
        return redirect()->route('table.index');
    }
}
