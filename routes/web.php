<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EloadingBestSeller_Controller;
use App\Http\Controllers\physical_Store_Computer_Stocks_Monitoring;
  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view-profile', function () {
    return view('view-profile');
});
 
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/status', function () {
        return view('productstatus');
     });
    Route::get('/ranking', function () {
        return view('ranking');
    });
    
    Route::get('/pisowifi-parts-accessories', function () {
        return view('PisoWifiPartsAccessories');
    });

    Route::get('/Parts-of-eloading', function () {
        return view('PartsOfEloading');
    });

    Route::get('/physical-store-computer-stocks-monitoring', function () {
        return view('PhysicalStoreComputerStocksMonitoring');
    });

    Route::get('/packaging-monitoring', function () {
        return view('PackagingMonitoring');
    });
    Route::get('/eloading-best-seller', function () {
        return view('EloadingBestSeller');
    });
    
    Route::get('/status', function () {
        return view('productstatus');
     });
    Route::get('/ranking', function () {
        return view('ranking');
    });
    Route::get('/customer', function () {
        return view('customerList');
    });
    
    Route::get('/status', function () {
        return view('productstatus');
     });
    Route::get('/ranking', function () {
        return view('ranking');
    });

    Route::get('eloading-best-seller',[EloadingBestSeller_Controller:: class,'showData']);
    Route::get('physical-store-computer-stocks-monitoring', [physical_Store_Computer_Stocks_Monitoring::class, 'showMonitoring']);
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});