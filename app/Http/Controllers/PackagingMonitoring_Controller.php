<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackagingMonitoring_Model;

class PackagingMonitoring_Controller extends Controller
{
    function ShowPackagingMonitoring(){

        $ShowPackagingMonitoring = PackagingMonitoring_Model::all();
        return view('packaging-monitoring',['_packaging_monitoring'=> $ShowPackagingMonitoring]);
    }
}
