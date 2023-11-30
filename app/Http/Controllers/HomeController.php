<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
use App\Models\PackagingMonitoringModel;
use App\Models\physical_Store_Computer_StocksMonitoring;
use App\Models\PisoWifi_parts_accessories;
use App\Models\PartsOfEloadingModel;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {

        $customers = Customers::count();


        $todayDate = Carbon::now()->format('Y-m-d');
        $thisMonth = Carbon::now()->format('m');
        
        $Total_Purchased_Orders = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();

        // bargraph
        $now = now()->format('Y-m-d');
        $orders = Order::select(DB::raw("'".$now."' AS date"), 'category', DB::raw('SUM(quantity_sold) AS quantity_sold'))
                    ->whereDate('created_at', '=', $now)
                    ->groupBy('date', 'category')
                    ->orderBy('quantity_sold', 'desc')
                    ->take(5)
                    ->get(['date', 'category', 'quantity_sold']);
        
        // Check if there are no sales for the current day
        if ($orders->isEmpty()) {
            $orders = collect([
                [
                    'date' => $now,
                    'category' => 'No Sale',
                    'quantity_sold' => 0
                ]
            ]);
        }

        //recently purchased products
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





        

        return view('adminHome', compact('Total_Purchased_Orders', 'customers','todayOrder','thisMonthOrder', 'orders','recentProducts', 'recentAddedProducts'));

    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }


}
