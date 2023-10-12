<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EloadingBestSellerModel;
use App\Models\Category;

class EloadingBestSeller_Controller extends Controller {
    function showData() {

        $inventory = EloadingBestSellerModel::paginate( 10 );

        return view( 'EloadingBestSeller', [ '_eloading_best_seller'=> $inventory ] );

    }

    public function store( Request $request ) {

        // Validate the request data
        $request->validate( [
            'Item' => 'required',
            'Quantity' => 'required|numeric',
            'Category' => 'required', // Make sure the field name matches the form input name
            'Date' => 'required|date',
        ] );

        // Create a new BestSeller model and populate its attributes
        $BestSeller = new EloadingBestSellerModel();

        $BestSeller->Item = $request->input( 'Item' );
        $BestSeller->Quantity = $request->input( 'Quantity' );
        $BestSeller->Category = $request->input( 'Category' );
        $BestSeller->Date = $request->input( 'Date' );

        // Save the record
        $BestSeller->save();

        return redirect()->back()->with( 'message', 'Add Items Successfully' );
    }

    public function updateItem( Request $request, $id ) {
        // Validate the request data
        $request->validate( [
            'Item' => 'required',
            'Quantity' => 'required|numeric',
            'Category' => 'required',
            'Date' => 'required|date',
        ] );

        // Find the item by ID
        $item = EloadingBestSellerModel::find( $id );

        if ( !$item ) {
            return redirect()->back()->with( 'error', 'Item not found' );
        }

        // Update the item's attributes
        $item->Item = $request->input('Item');
        $item->Quantity = $request->input('Quantity');
        $item->Category = $request->input('Category');
        $item->Date = $request->input('Date');

        // Save the changes
        $item->save();

        return redirect()->back()->with('message', 'Item updated successfully' );
    }

}
