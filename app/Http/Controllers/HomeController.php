<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;
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
        $this->middleware( 'auth' );
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

        $orders = Order::paginate(10);
        return view( 'adminHome', compact( 'orders' ) );
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
        return view( 'managerHome' );
    }

    // function showData() {

    //     $inventory = EloadingBestSellerModel::paginate( 10 );
    //     return view( 'adminHome', [ '_eloading_best_seller'=> $inventory ] );

    // }






}
