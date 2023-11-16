<?php

namespace App\Http\Controllers;

use App\Models\Order;

class ProductControlller extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->paginate(10);

        return view('productstatus', [
            'productStatus' => $orders,
        ]);
    }
}
