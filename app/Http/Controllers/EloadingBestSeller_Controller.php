<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EloadingBestSellerModel;



class EloadingBestSeller_Controller extends Controller
{
    function showData(){

        $inventory = EloadingBestSellerModel::all();

        return view('EloadingBestSeller', ['_eloading_best_seller'=> $inventory]);

      
    }
}
