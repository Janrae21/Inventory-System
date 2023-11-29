<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductStatusExport;
use App\Models\Order;

class ProductControlller extends Controller {
    public function index() {
        // $orders = Order::paginate( 10 );
        $orders = Order::with( 'customer' )->get();

        return view( 'productstatus', [
            'productStatus' => $orders,
        ] );
    }

    public function export() 
    {   return Excel::download(new ProductStatusExport, 'ProductStatusData.xlsx');
    
    }


}
