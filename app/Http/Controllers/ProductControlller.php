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
            DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as purchase_date'),
            DB::raw('SUM(quantity_sold) as total_purchased'),
            DB::raw('JSON_ARRAYAGG(item_name) as item_names'),
            DB::raw('MAX(id) as id'),
            DB::raw('JSON_ARRAYAGG(shipment_status) as status'),
            DB::raw('JSON_ARRAYAGG(category) as category'),
            DB::raw('JSON_ARRAYAGG(quantity_sold) as quantity'),
        )
            ->with('customer')
            ->groupBy('customer_id', 'purchase_date')
            ->get();

        // $orders = Order::with('customer')->get();

        return view('productstatus', [
            'productStatus' => $orders,
        ]);
    }

    public function export()
    {
        return Excel::download(new ProductStatusExport, 'ProductStatusData.xlsx');
    }
}
