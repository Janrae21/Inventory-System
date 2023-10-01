<?php

namespace App\Http\Controllers;
use App\Models\physical_Store_Computer_StocksMonitoring;
use Illuminate\Http\Request;
class physical_Store_Computer_Stocks_Monitoring extends Controller
{
    public function showMonitoring()
    {
        $Data = physical_Store_Computer_StocksMonitoring::paginate(8);

        return view('PhysicalStoreComputerStocksMonitoring', ['_physical_store_computer_stocks_monitoring' => $Data]);
    }


    public function store(Request $request){


        $request->validate([

            'ItemsName' => 'required',
            'Status' => 'required',
            'RemainingStocks' => 'required|numeric',
            'ItemSoldAsOf' => 'required|numeric',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorforesting' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'RemarksUpdatedAsOf' => 'required',

        ]);


        $physicalStockMonitoring = new physical_Store_Computer_StocksMonitoring();

        $physicalStockMonitoring->ItemsName = $request->input('ItemsName');
        $physicalStockMonitoring->Status = $request->input('Status');
        $physicalStockMonitoring->RemainingStocks = $request->input('RemainingStocks');
        $physicalStockMonitoring->ItemSoldAsOf = $request->input('ItemSoldAsOf');
        $physicalStockMonitoring->StocksPurchased = $request->input('StocksPurchased');
        $physicalStockMonitoring->ActualStocksBasedonactualcheckingEDUD = $request->input('ActualStocksBasedonactualcheckingEDUD');
        $physicalStockMonitoring->Damageormissingorforesting = $request->input('Damageormissingorforesting');
        $physicalStockMonitoring->UpcomingStocks = $request->input('UpcomingStocks');
        $physicalStockMonitoring->RemarksUpdatedAsOf = $request->input('RemarksUpdatedAsOf');

        $physicalStockMonitoring->save();

        return redirect()->back()->with('message', 'Add Items Successfully');


    }







}
