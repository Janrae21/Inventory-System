<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\PackagingMonitoringModel;
use Illuminate\Http\Request;

class PackagingMonitoringController extends Controller {

    // ShowPackaging Data

    public function ShowPackaging() {

        $packaging = PackagingMonitoringModel::paginate( 10 );
        return view( 'PackagingMonitoring', [ 'packagingmonitoring'=> $packaging ] );
    }

    // Store Function

    public function store( Request $request ) {

        $request->validate( [

            'ItemsName' => 'required',
            'Status' => 'required',
            'RemainingStocks' => 'required|numeric',
            'ItemSoldAsOf' => 'required|numeric',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorforesting' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'RemarksUpdatedAsOf' => 'required',

        ] );

        $packagingMonitoring = new PackagingMonitoringModel();

        $packagingMonitoring->ItemsName = $request->input( 'ItemsName' );
        $packagingMonitoring->Status = $request->input( 'Status' );
        $packagingMonitoring->RemainingStocks = $request->input( 'RemainingStocks' );
        $packagingMonitoring->ItemSoldAsOf = $request->input( 'ItemSoldAsOf' );
        $packagingMonitoring->StocksPurchased = $request->input( 'StocksPurchased' );
        $packagingMonitoring->ActualStocksBasedonactualcheckingEDUD = $request->input( 'ActualStocksBasedonactualcheckingEDUD' );
        $packagingMonitoring->Damageormissingorforesting = $request->input( 'Damageormissingorforesting' );
        $packagingMonitoring->UpcomingStocks = $request->input( 'UpcomingStocks' );
        $packagingMonitoring->RemarksUpdatedAsOf = $request->input( 'RemarksUpdatedAsOf' );

        $packagingMonitoring->save();

        return redirect()->back()->with( 'message', 'Add Items Successfully' );
    }

    // View Function

    public function viewItem( $id ) {
        $pm = PackagingMonitoringModel::findOrFail( $id );
        return view( 'product_view', [ 'PackagingMonitoring' => $pm ] );
    }

    // Update Function

    public function update( Request $request, $id ) {
        $request->validate( [
            'Status' => 'required',
            'StocksPurchased' => 'required|numeric',
            'ActualStocksBasedonactualcheckingEDUD' => 'required|numeric',
            'Damageormissingorforesting' => 'required|numeric',
            'RemainingStocks' => 'required|numeric',
            'UpcomingStocks' => 'required|numeric',
            'RemarksUpdatedAsOf' => 'required',
        ] );

        $packagingMonitoring = PackagingMonitoringModel::findOrFail( $id );

        $packagingMonitoring->update( [
            'Status' => $request->input( 'Status' ),
            'StocksPurchased' => $request->input( 'StocksPurchased' ),
            'ActualStocksBasedonactualcheckingEDUD' => $request->input( 'ActualStocksBasedonactualcheckingEDUD' ),
            'Damageormissingorforesting' => $request->input( 'Damageormissingorforesting' ),
            'RemainingStocks' => $request->input( 'RemainingStocks' ),
            'UpcomingStocks' => $request->input( 'UpcomingStocks' ),
            'RemarksUpdatedAsOf' => $request->input( 'RemarksUpdatedAsOf' ),
        ] );


        return redirect()->back()->with( 'message', 'Item updated successfully' );
    }


    //Delete Function
    public function delete( $id ) {

        $packagingMonitoring = PackagingMonitoringModel::findOrFail( $id );
        $packagingMonitoring->delete();

        return redirect()->back()->with( 'message', 'Item deleted successfully' );
    }

}
