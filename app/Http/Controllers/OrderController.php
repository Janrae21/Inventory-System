<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function index() {
        $orders = Order::all();
        return view( 'orders.index', compact( 'orders' ) );
    }

    public function create() {
        return view( 'orders.create' );
    }

    public function store( Request $request ) {

        $data = $request->all();
        $data['category'] = 'default_value'; // Set the default value
        $data['customer_name'] = 'default_value'; // Set the default value

        $order = Order::create($data);
        return redirect()->back()->with('Message-Success', 'Order created successfully.');
    }


    public function show( Order $order ) {
        return view( 'orders.show', compact( 'order' ) );
    }

    // public function edit( Order $order )
    // {
    //     return view( 'orders.edit', compact( 'order' ) );
    // }

    // public function update( Request $request, Order $order )
    // {
    //     $order->update( $request->all() );
    //     return redirect()->route( 'orders.index' )->with( 'success', 'Order updated successfully.' );
    // }

    // public function destroy( Order $order )
    // {
    //     $order->delete();
    //     return redirect()->route( 'orders.index' )->with( 'success', 'Order deleted successfully.' );
    // }
}
