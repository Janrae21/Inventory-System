<?php

namespace App\Http\Controllers;
use App\Models\PartsOfEloadingModel;
use Illuminate\Http\Request;

class PartsOfEloadingController extends Controller {

    public function showEloading() {
        $DataEloading = PartsOfEloadingModel::paginate( 10 );

        return view( 'PartsOfEloading', [ '_parts_of_eloading' => $DataEloading ] );
    }

    public function store( Request $request ) {

        $request->validate( [

            'ItemsName' => 'required',
            'Status' => 'required',
            'RemainingStocks' => 'required|numeric',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorfortesting' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'Remarks' => 'required',

        ] );

        $partsofEloading = new PartsOfEloadingModel();

        $partsofEloading->ItemsName = $request->input( 'ItemsName' );
        $partsofEloading->Status = $request->input( 'Status' );
        $partsofEloading->RemainingStocks = $request->input( 'RemainingStocks' );
        $partsofEloading->StocksPurchased = $request->input( 'StocksPurchased' );
        $partsofEloading->ActualStocksBasedonactualcheckingEDUD = $request->input( 'ActualStocksBasedonactualcheckingEDUD' );
        $partsofEloading->Damageormissingorfortesting = $request->input( 'Damageormissingorfortesting' );
        $partsofEloading->UpcomingStocks = $request->input( 'UpcomingStocks' );
        $partsofEloading->Remarks = $request->input( 'Remarks' );
        $partsofEloading->created_at = now();
        $partsofEloading->updated_at = now();

        $partsofEloading->save();

        return redirect()->back()->with( 'message-Add', 'Add Items Successfully' );

    }

    public function viewItem( $id ) {
        $pe = PartsOfEloadingModel::findOrFail( $id );
        return view( 'product_view', [ 'PartsOfEloading' => $pe ] );
    }


     // Update Function
     public function update( Request $request, $id ) {
        $request->validate( [
            'ItemsName' => 'required',
            'Status' => 'required',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorfortesting' => 'required|numeric',
            'RemainingStocks' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'Remarks' => 'required',
        ] );

        $partsofEloading = PartsOfEloadingModel::findOrFail( $id );

        $partsofEloading->update( [
            'ItemsName' => $request->input( 'ItemsName' ),
            'Status' => $request->input( 'Status' ),
            'StocksPurchased' => $request->input( 'StocksPurchased' ),
            'ActualStocksBasedonactualcheckingEDUD' => $request->input( 'ActualStocksBasedonactualcheckingEDUD' ),
            'Damageormissingorfortesting' => $request->input( 'Damageormissingorfortesting' ),
            'RemainingStocks' => $request->input( 'RemainingStocks' ),
            'UpcomingStocks' => $request->input( 'UpcomingStocks' ),
            'Remarks' => $request->input( 'Remarks' ),


        ] );

        return redirect()->back()->with( 'message', 'Item updated successfully' );
    }


    //Delete Function
    public function delete( $id ) {

        $partsofEloading = PartsOfEloadingModel::findOrFail( $id );
        $partsofEloading->delete();

        return redirect()->back()->with( 'message delete', 'Item deleted successfully' );
    }






























}

