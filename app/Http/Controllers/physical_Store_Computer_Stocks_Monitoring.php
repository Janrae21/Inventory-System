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



    // Add Function
    public function store(Request $request){


        $request->validate([

            'ItemsName' => 'required',
            'Status' => 'required',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorforesting' => 'required|numeric',
            'RemainingStocks' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'RemarksUpdatedAsOf' => 'required',

        ]);


        $physicalStockMonitoring = new physical_Store_Computer_StocksMonitoring();

        $physicalStockMonitoring->ItemsName = $request->input('ItemsName');
        $physicalStockMonitoring->Status = $request->input('Status');
        $physicalStockMonitoring->RemainingStocks = $request->input('RemainingStocks');
        $physicalStockMonitoring->StocksPurchased = $request->input('StocksPurchased');
        $physicalStockMonitoring->ActualStocksBasedonactualcheckingEDUD = $request->input('ActualStocksBasedonactualcheckingEDUD');
        $physicalStockMonitoring->Damageormissingorforesting = $request->input('Damageormissingorforesting');
        $physicalStockMonitoring->UpcomingStocks = $request->input('UpcomingStocks');
        $physicalStockMonitoring->RemarksUpdatedAsOf = $request->input('RemarksUpdatedAsOf');


        $physicalStockMonitoring->save();

        return redirect()->back()->with('message', 'Add Items Successfully');


    }
    public function viewItem($id)
    {
        $ps = physical_Store_Computer_StocksMonitoring::findOrFail($id);
        return view('product_view', ['physical_Store_Computer_StocksMonitoring' => $ps]);
    }




    //Delete Function
    public function delete( $id ) {

        $physicalStockMonitoring = physical_Store_Computer_StocksMonitoring::findOrFail( $id );
        $physicalStockMonitoring->delete();

        return redirect()->back()->with( 'message', 'Item deleted successfully' );
    }







}
