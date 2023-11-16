<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
use Illuminate\View\View;

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
        $orders = Order::count();
        $customers = Customers::count();

        return view('adminHome', compact('orders', 'customers'));
        // $inventory = EloadingBestSellerModel::paginate( 10 );
        // return view( 'adminHome', [ '_eloading_best_seller'=> $inventory ] );
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

    // function showData() {

    //     $inventory = EloadingBestSellerModel::paginate( 10 );
    //     return view( 'adminHome', [ '_eloading_best_seller'=> $inventory ] );

    // }
}
