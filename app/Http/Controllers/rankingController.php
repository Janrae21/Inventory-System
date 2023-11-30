<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\View\View;
use App\Models\PackagingMonitoringModel;
use App\Models\physical_Store_Computer_StocksMonitoring;
use App\Models\PisoWifi_parts_accessories;
use App\Models\PartsOfEloadingModel;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class rankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ranking():View
    {
        

            $ordersRank = Order::select('category', DB::raw('SUM(quantity_sold) as quantity_sold'))
            ->groupBy('category')
            ->orderBy('quantity_sold', 'desc')
            ->take(5)
            ->get(['category', 'quantity_sold']);

            $recentProducts = Order::select('item_name', 'quantity_sold', 'category', 'created_at')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    
            //recently added product
            $packagingProducts =PackagingMonitoringModel::select('ItemsName', 'StocksPurchased', 'created_at')
            ->latest('created_at')
            ->take(5)
            ->get();
    
            $pisowifiProducts = PisoWifi_parts_accessories::select('ItemsName', 'StocksPurchased',  'created_at')
                ->latest('created_at')
                ->take(5)
                ->get();
    
            $physicalStoreProducts = physical_Store_Computer_StocksMonitoring::select('ItemsName', 'StocksPurchased',  'created_at')
                ->latest('created_at')
                ->take(5)
                ->get();
    
            $eloadingProducts = PartsOfEloadingModel::select('ItemsName', 'StocksPurchased','created_at')
                ->latest('created_at')
                ->take(5)
                ->get();
    
            //combination of all selected products from different table
            $recentAddedProducts = collect()
                ->concat($packagingProducts)
                ->concat($pisowifiProducts)
                ->concat($physicalStoreProducts)
                ->concat($eloadingProducts)
                ->sortBy('created_at')
                ->take(10);
    
    
                $monthlyQuantitySold = DB::table('orders')
                ->select('item_name', DB::raw('SUM(quantity_sold) as total_quantity_sold'))
                ->groupBy('item_name')
                ->orderBy('total_quantity_sold', 'desc')
                ->get();

            //customer ranking
                $topCustomers = Customers::select('customers.name as customer_name', DB::raw('SUM(orders.quantity_sold) AS total_quantity_sold'))
                ->join('orders', 'customers.id', '=', 'orders.customer_id')
                ->groupBy('customers.id', 'customers.name')
                ->orderBy('total_quantity_sold', 'desc')
                ->take(5)
                ->get();
            
                return view('ranking', compact('recentProducts', 'recentAddedProducts', 'monthlyQuantitySold', 'ordersRank', 'topCustomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
