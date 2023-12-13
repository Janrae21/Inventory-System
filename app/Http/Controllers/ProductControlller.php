<?php

namespace App\Http\Controllers;

use App\Exports\ProductStatusExport;
use App\Models\Order;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductControlller extends Controller
 {
    public function index()
 {
        // $orders = Order::paginate( 10 );

        $orders = Order::select(
            'customer_id',
            DB::raw( 'DATE_FORMAT(created_at, "%Y-%m-%d") as purchase_date' ),
            DB::raw( 'SUM(quantity_sold) as total_purchased' ),
            DB::raw( 'GROUP_CONCAT(item_name) as item_names' ),
            DB::raw( 'MAX(id) as id' ),
            DB::raw( 'GROUP_CONCAT(shipment_status) as status' ),
            DB::raw( 'GROUP_CONCAT(category) as category' ),
            DB::raw( 'GROUP_CONCAT(quantity_sold) as quantity' ),
        )
        ->with( 'customer' )
        ->groupBy( 'customer_id', 'purchase_date' )
        ->get();

        // $orders = Order::with( 'customer' )->get();
        logger($orders->toArray());
        return view( 'productstatus', [
            'productStatus' => $orders,
        ] );
    }

    public function export()
 {
        return Excel::download( new ProductStatusExport, 'ProductStatusData.xlsx' );
    }
}
