<?php

namespace App\Http\Controllers;
use App\Models\Customers;
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

        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->age = $request->input('age');
        $customer->email = $request->input('email');
        $customer->created_at = now();
        $customer->updated_at = now();

        $customer->save();

        return redirect()->back()->with( 'message-Customer', 'Customer Added Successfully' );

    }
}
