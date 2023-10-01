<?php

namespace App\Http\Controllers;
use App\Models\PisoWifi_parts_accessories;
use Illuminate\Http\Request;
class PisoWifi_parts_accessories_Controller extends Controller
{
    public function PisoWifiShow(){

        $pisowifiData = PisoWifi_parts_accessories::paginate(10);
        return view('PisoWiFiPartsAccessories', ['pisowifi_parts_accessories'=> $pisowifiData]);
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


        $PisoWifiAccessories = new PisoWifi_parts_accessories();

        $PisoWifiAccessories->ItemsName = $request->input('ItemsName');
        $PisoWifiAccessories->Status = $request->input('Status');
        $PisoWifiAccessories->RemainingStocks = $request->input('RemainingStocks');
        $PisoWifiAccessories->ItemSoldAsOf = $request->input('ItemSoldAsOf');
        $PisoWifiAccessories->StocksPurchased = $request->input('StocksPurchased');
        $PisoWifiAccessories->ActualStocksBasedonactualcheckingEDUD = $request->input('ActualStocksBasedonactualcheckingEDUD');
        $PisoWifiAccessories->Damageormissingorforesting = $request->input('Damageormissingorforesting');
        $PisoWifiAccessories->UpcomingStocks = $request->input('UpcomingStocks');
        $PisoWifiAccessories->RemarksUpdatedAsOf = $request->input('RemarksUpdatedAsOf');

        $PisoWifiAccessories->save();

        return redirect()->back()->with('message', 'Add Items Successfully');

    }














}
