<?php

namespace App\Http\Controllers;
use App\Models\PartsOfEloadingModel;
use Illuminate\Http\Request;

class PartsOfEloadingController extends Controller
{
    public function showEloading()
    {
        $DataEloading = PartsOfEloadingModel::paginate(10);

        return view('PartsOfEloading', ['_parts_of_eloading' => $DataEloading]);
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

        $partsofEloading = new PartsOfEloadingModel();

        $partsofEloading->ItemsName = $request->input('ItemsName');
        $partsofEloading->Status = $request->input('Status');
        $partsofEloading->RemainingStocks = $request->input('RemainingStocks');
        $partsofEloading->ItemSoldAsOf = $request->input('ItemSoldAsOf');
        $partsofEloading->StocksPurchased = $request->input('StocksPurchased');
        $partsofEloading->ActualStocksBasedonactualcheckingEDUD = $request->input('ActualStocksBasedonactualcheckingEDUD');
        $partsofEloading->Damageormissingorforesting = $request->input('Damageormissingorforesting');
        $partsofEloading->UpcomingStocks = $request->input('UpcomingStocks');
        $partsofEloading->RemarksUpdatedAsOf = $request->input('RemarksUpdatedAsOf');

        $partsofEloading->save();

        return redirect()->back()->with('message', 'Add Items Successfully');

    }
    public function viewItem($id)
    {
        $pe = PartsOfEloadingModel::findOrFail($id);
        return view('product_view', ['PartsOfEloading' => $pe]);
    }

    


}








