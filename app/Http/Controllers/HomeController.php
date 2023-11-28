<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
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


        $todayDate = Carbon::now()->format('d-m-y');
        $thisMonth = Carbon::now()->format('m');

        $orders = Order::select('category', DB::raw('COUNT(*) as count'))
        ->groupBy('category')
        ->get(['category', 'count']);

        $Total_Purchased_Orders = Order::count();
        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();

        

        return view('adminHome', compact('Total_Purchased_Orders', 'customers','todayOrder','thisMonthOrder', 'orders'));

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
