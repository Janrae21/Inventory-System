<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PisoWifi_parts_AccessoriesExport;
use App\Models\PisoWifi_parts_accessories;
use Illuminate\Http\Request;

class PisoWifi_parts_accessories_Controller extends Controller
{
    public function PisoWifiShow()
    {
        $pisowifiData = PisoWifi_parts_accessories::paginate(10);
        $customers = Customers::all();

        return view('PisoWiFiPartsAccessories', [
            'pisowifi_parts_accessories' => $pisowifiData,
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {
        $request['Status'] = 'Pending';

        PisoWifi_parts_accessories::create($request->toArray());

        return redirect()->back()->with('message-Add', 'Add Items Successfully');
    }

    public function viewItem($id)
    {
        $pisoWifi = PisoWifi_parts_accessories::findOrFail($id);

        return view('product_view', ['pisoWifi' => $pisoWifi]);
    }

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

        $PisoWifiAccessories = PisoWifi_parts_accessories::findOrFail($id);

        $PisoWifiAccessories->update([
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
        $PisoWifiAccessories = PisoWifi_parts_accessories::findOrFail($id);
        $PisoWifiAccessories->delete();

        return redirect()->back()->with('message-delete', 'Item Successfully Deleted');
    }

    public function exportExcel()
    {   return Excel::download(new PisoWifi_parts_AccessoriesExport, 'PisoWifi_parts_Accessories.Data.xlsx');

    }



}
