<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\physical_Store_Computer_StocksMonitoring;


class physical_Store_Computer_Stocks_Monitoring extends Controller
{
    function showMonitoring(){

        $Data = physical_Store_Computer_StocksMonitoring::paginate(10);
        return view('PhysicalStoreComputerStocksMonitoring', ['_physical_store_computer_stocks_monitoring'=> $Data]);
    }
}