<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PackagingExport;
use App\Models\PackagingMonitoringModel;
use Illuminate\Http\Request;

class PackagingMonitoringController extends Controller
{
    // ShowPackaging Data
    public function ShowPackaging()
    {
        $packaging = PackagingMonitoringModel::paginate(10);

        $customers = Customers::all();

        return view('PackagingMonitoring', [
            'packagingmonitoring' => $packaging,
            'customers' => $customers,
        ]);
    }

    // Store Function
    public function store(Request $request)
    {
        $request['Status'] = 'Pending';

        PackagingMonitoringModel::create($request->toArray());
        // $request->validate( [

        //     'ItemsName' => 'required',
        //     'Status' => 'required',
        //     'RemainingStocks' => 'required|numeric',
        //     'StocksPurchased' => 'required|numeric',
        //     'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
        //     'Damageormissingorfortesting' => 'required|numeric',
        //     'UpcomingStocks' => 'required|numeric',
        //     'Remarks' => 'required',

        // ] );

        // $packagingMonitoring = new PackagingMonitoringModel();

        // $packagingMonitoring->ItemsName = $request->input( 'ItemsName' );
        // $packagingMonitoring->Status = $request->input( 'Status' );
        // $packagingMonitoring->RemainingStocks = $request->input( 'RemainingStocks' );
        // $packagingMonitoring->StocksPurchased = $request->input( 'StocksPurchased' );
        // $packagingMonitoring->ActualStocksBasedonactualcheckingEDUD = $request->input( 'ActualStocksBasedonactualcheckingEDUD' );
        // $packagingMonitoring->Damageormissingorfortesting = $request->input( 'Damageormissingorfortesting' );
        // $packagingMonitoring->UpcomingStocks = $request->input( 'UpcomingStocks' );
        // $packagingMonitoring->Remarks = $request->input( 'Remarks' );
        // $packagingMonitoring->created_at = now();
        // $packagingMonitoring->updated_at = now();

        // $packagingMonitoring->save();

        return redirect()->back()->with('message-Add', 'Add Items Successfully');
    }

    // View Function
    public function viewItem($id)
    {
        $pm = PackagingMonitoringModel::findOrFail($id);

        return view('product_view', ['PackagingMonitoringModel' => $pm]);
    }

    // Update Function
    public function update(Request $request, $id)
    {
        // dd($request->all());
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

        $packagingMonitoring = PackagingMonitoringModel::findOrFail($id);

        $packagingMonitoring->update([

            'ItemsName' => $request->input('ItemsName'),
            'Status' => $request->input('Status'),
            'StocksPurchased' => $request->input('StocksPurchased'),
            'ActualStocksBasedonactualcheckingEDUD' => $request->input('ActualStocksBasedonactualcheckingEDUD'),
            'Damageormissingorfortesting' => $request->input('Damageormissingorfortesting'),
            'RemainingStocks' => $request->input('RemainingStocks'),
            'UpcomingStocks' => $request->input('UpcomingStocks'),
            'Remarks' => $request->input('Remarks'),

        ]);

        return redirect()->back()->with('message-edit', 'Item updated successfully');
    }

    //Delete Function
    public function delete($id)
    {
        $packagingMonitoring = PackagingMonitoringModel::findOrFail($id);
        $packagingMonitoring->delete();

        return redirect()->back()->with('message', 'Item deleted successfully');
    }


    public function export() 
    {   return Excel::download(new PackagingExport, 'packagingData.xlsx');
    
    }
}