<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ProductControlller extends Controller {
    public function index() {
        // $orders = Order::paginate( 10 );
        $orders = Order::with( 'customer' )->get();

        return view( 'productstatus', [
            'productStatus' => $orders,
        ] );
    }

    //Delete Function


}
