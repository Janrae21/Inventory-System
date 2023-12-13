<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\physical_Store_Computer_StocksMonitoring;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PhysicalStocksExport;
use Illuminate\Http\Request;

class physical_Store_Computer_Stocks_Monitoring extends Controller
{
    public function showMonitoring()
    {
        $Data = physical_Store_Computer_StocksMonitoring::paginate(8);
        $customers = Customers::all();

        return view('PhysicalStoreComputerStocksMonitoring', [
            '_physical_store_computer_stocks_monitoring' => $Data,
            'customers' => $customers,
        ]);
    }

    // Add Function
    public function store(Request $request)
    {
        $request['Status'] = 'Pending';

        physical_Store_Computer_StocksMonitoring::create($request->toArray());

        return redirect()->back()->with('message-Add', 'Add Items Successfully');
    }

    public function viewItem($id)
    {
        $ps = physical_Store_Computer_StocksMonitoring::findOrFail($id);

        return view('product_view', ['physical_Store_Computer_StocksMonitoring' => $ps]);
    }

    // Update Function

    public function update(Request $request, $id)
    {
        $request->validate([
            'ItemsName' => 'required',
            'Status' => 'required',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorfortesting' => 'required|numeric',
            'RemainingStocks' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'Remarks' => 'required',
        ]);

        $physicalStockMonitoring = physical_Store_Computer_StocksMonitoring::findOrFail($id);

        $physicalStockMonitoring->update([
            'ItemsName' => $request->input('ItemsName'),
            'Status' => $request->input('Status'),
            'StocksPurchased' => $request->input('StocksPurchased'),
            'ActualStocksBasedonactualcheckingEDUD' => $request->input('ActualStocksBasedonactualcheckingEDUD'),
            'Damageormissingorfortesting' => $request->input('Damageormissingorfortesting'),
            'RemainingStocks' => $request->input('RemainingStocks'),
            'UpcomingStocks' => $request->input('UpcomingStocks'),
            'Remarks' => $request->input('Remarks'),
            'treshold' => $request->input('treshold'),

        ]);

        return redirect()->back()->with('message', 'Item updated successfully');
    }

    //Delete Function
    public function delete($id)
    {
        $physicalStockMonitoring = physical_Store_Computer_StocksMonitoring::findOrFail($id);
        $physicalStockMonitoring->delete();

        return redirect()->back()->with('message delete', 'Item deleted successfully');
    }

    public function export()
    {   return Excel::download(new PhysicalStocksExport, 'Physical_stock.Data.xlsx');

    }
}
