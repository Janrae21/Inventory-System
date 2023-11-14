<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {

    public function index() {

        $orders = Order::paginate( 10 );
        return view( 'CustomerList', compact( 'orders' ) );
    }

    public function ShowStatus() {

        $orders = Order::paginate( 10 );
        return view( 'productstatus', compact( 'orders' ) );
    }

    public function create() {
        return view( 'orders.create' );
    }

    public function store( Request $request ) {

        $data = $request->all();
        $data[ 'category' ] = 'N/A';
        $data[ 'customer_name' ] = 'N/A';

        $order = Order::create( $data );
        return redirect()->back()->with( 'Message-Success', 'Order created successfully.' );
    }

    public function show( Order $order ) {
        return view( 'orders.show', compact( 'order' ) );
    }

    //Delete Function

    public function delete( $id ) {

        $order = Order::findOrFail( $id );
        $order->delete();

        return redirect()->back()->with( 'message delete', 'Item deleted successfully' );
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
