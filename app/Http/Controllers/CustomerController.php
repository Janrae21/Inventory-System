<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use Illuminate\Http\Request;

class CustomerController extends Controller {

    public function store( Request $request ) {

        $request->validate( [

            'name' => 'required',
            'address' => 'required',
            'age' => 'required|numeric',
            'email' => 'required',

        ] );

        $customer = new Customers();

        $customer->name = $request->input( 'name' );
        $customer->address = $request->input( 'address' );
        $customer->age = $request->input( 'age' );
        $customer->email = $request->input( 'email' );
        $customer->created_at = now();
        $customer->updated_at = now();

        $customer->save();

        return redirect()->back()->with( 'message-Customer', 'Customer Added Successfully' );

    }

    public function update( Request $request, $id ) {
        $request->validate( [

            'name' => 'required',
            'address' => 'required',
            'age' => 'required|numeric',
            'email' => 'required|email',
        ] );

        $customer = Customers::findOrFail( $id );

        $customer->update( [
            'name' => $request->input( 'name' ),
            'address' => $request->input( 'address' ),
            'age' => $request->input( 'age' ),
            'email' => $request->input( 'email' ),
        ] );

        return redirect()->back()->with( 'message-Customer', 'Customer Updated Successfully' );
    }


    public function export() {
        return Excel::download( new CustomerExport, 'CustomerExportData.xlsx' );

    }

}
