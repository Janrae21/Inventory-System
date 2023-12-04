<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PartsOfEloadingExport;
use App\Models\PartsOfEloadingModel;
use Illuminate\Http\Request;

class PartsOfEloadingController extends Controller
{
    public function showEloading()
    {
        $DataEloading = PartsOfEloadingModel::paginate(10);
        $customers = Customers::all();

        return view('PartsOfEloading', [
            '_parts_of_eloading' => $DataEloading,
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {
        $request['Status'] = 'Pending';

        PartsOfEloadingModel::create($request->toArray());


        return redirect()->back()->with( 'message-Add', 'Add Items Successfully' );
    }

    public function viewItem($id)
    {
        $pe = PartsOfEloadingModel::findOrFail($id);

        return view('product_view', ['PartsOfEloading' => $pe]);
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

         $partsofEloading = PartsOfEloadingModel::findOrFail($id);

         $partsofEloading->update([
             'ItemsName' => $request->input('ItemsName'),
             'Status' => $request->input('Status'),
             'StocksPurchased' => $request->input('StocksPurchased'),
             'ActualStocksBasedonactualcheckingEDUD' => $request->input('ActualStocksBasedonactualcheckingEDUD'),
             'Damageormissingorfortesting' => $request->input('Damageormissingorfortesting'),
             'RemainingStocks' => $request->input('RemainingStocks'),
             'UpcomingStocks' => $request->input('UpcomingStocks'),
             'Remarks' => $request->input('Remarks'),

         ]);

         return redirect()->back()->with('message', 'Item updated successfully');
     }

    //Delete Function
    public function delete($id)
    {
        $partsofEloading = PartsOfEloadingModel::findOrFail($id);
        $partsofEloading->delete();

        return redirect()->back()->with('message delete', 'Item deleted successfully');
    }

     public function export()
    {   return Excel::download(new PartsOfEloadingExport, 'Parts_of_Eloading.Data.xlsx');

    }

}
