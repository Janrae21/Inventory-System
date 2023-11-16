<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
use App\Models\PisoWifi_parts_accessories;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::with('customer')->paginate(10);
        $customers = Customers::paginate(10);

        return view('CustomerList', compact('customers'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $product = PisoWifi_parts_accessories::where('id', $data['product_id'])->first();

        $product->RemainingStocks = $product->RemainingStocks - $data['quantity_sold'];

        $product->save();

        unset($data['product_id']);

        Order::create($data);

        return redirect()->back()->with('Message-Success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
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
