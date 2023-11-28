<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductStatus_Controller extends Controller
{
    public function index() {

        $orders = Order::paginate(10);
        return view( 'productstatus', compact( 'orders' ) );
    }


   

}
