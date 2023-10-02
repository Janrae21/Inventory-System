<?php

namespace App\Http\Controllers;
use App\Models\PackagingMonitoringModel;
use Illuminate\Http\Request;

class PackagingMonitoringController extends Controller
{
    public function ShowPackaging(){

        $packaging = PackagingMonitoringModel::paginate(10);
        return view('PackagingMonitoring', ['packagingmonitoring'=> $packaging]);
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


        $packagingMonitoring = new PackagingMonitoringModel();

        $packagingMonitoring->ItemsName = $request->input('ItemsName');
        $packagingMonitoring->Status = $request->input('Status');
        $packagingMonitoring->RemainingStocks = $request->input('RemainingStocks');
        $packagingMonitoring->ItemSoldAsOf = $request->input('ItemSoldAsOf');
        $packagingMonitoring->StocksPurchased = $request->input('StocksPurchased');
        $packagingMonitoring->ActualStocksBasedonactualcheckingEDUD = $request->input('ActualStocksBasedonactualcheckingEDUD');
        $packagingMonitoring->Damageormissingorforesting = $request->input('Damageormissingorforesting');
        $packagingMonitoring->UpcomingStocks = $request->input('UpcomingStocks');
        $packagingMonitoring->RemarksUpdatedAsOf = $request->input('RemarksUpdatedAsOf');

        $packagingMonitoring->save();

        return redirect()->back()->with('message', 'Add Items Successfully');




    }

}
