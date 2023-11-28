<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EloadingBestSeller_Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackagingMonitoringController;
use App\Http\Controllers\PartsOfEloadingController;
use App\Http\Controllers\physical_Store_Computer_Stocks_Monitoring;
use App\Http\Controllers\PisoWifi_parts_accessories_Controller;
use App\Http\Controllers\ProductControlller;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'admin/home');
Auth::routes();

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
    Route::get('/admin/home', [HomeController::class, 'adminHome', 'productStatus'])->name('admin.home');

    Route::get('/ranking', function () {
        return view('ranking');
    });
    // Route::get('/pisowifi-parts-accessories', function () {
    //     return view('PisoWifiPartsAccessories');
    // });
    // Route::get('/Parts-of-eloading', function () {
    //     return view('PartsOfEloading');
    // });
    // Route::get('/physical-store-computer-stocks-monitoring', function () {
    //     return view('PhysicalStoreComputerStocksMonitoring');
    // });
    // Route::get('/packaging-monitoring', function () {
    //     return view('PackagingMonitoring');
    // });
    Route::get('/eloading-best-seller', function () {
        return view('EloadingBestSeller');
    });

    Route::get('/customer', function () {
        return view('customerList');
    });
    Route::get('/status', [ProductControlller::class, 'index']);
    Route::delete('/status/{id}', [ProductControlller::class, 'delete'])->name('status.delete');

    Route::get('/view-profile', function () {
        return view('view-profile');
    });

    //Orders
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('customer', [OrderController::class, 'index']);

    //Customers
    Route::post('/Customers', [CustomerController::class, 'store'])->name('Customers.store');
    Route::put('/Customers/{id}', [CustomerController::class, 'update'])->name('Customers.update');
    Route::delete('/Customers/{id}', [CustomerController::class, 'delete'])->name('Customers.delete');

    //PisoWifi Parts Accessories Crud//
    Route::get('pisowifi-parts-accessories', [PisoWifi_parts_accessories_Controller::class, 'PisoWifiShow']);
    Route::post('pisowifi-parts-accessories', [PisoWifi_parts_accessories_Controller::class, 'store']);
    Route::get('/view/item/{id}', [PisoWifi_parts_accessories_Controller::class, 'viewItem'])->name('view.item');
    Route::put('/pisowifi-parts-accessories/{id}', [PisoWifi_parts_accessories_Controller::class, 'update'])->name('pisowifi-parts-accessories.update');
    Route::delete('/pisowifi-parts-accessories/{id}', [PisoWifi_parts_accessories_Controller::class, 'delete'])->name('pisowifi-parts-accessories.delete');

    //Packaging Monitoring Crud//
    Route::post('packaging-monitoring', [PackagingMonitoringController::class, 'store']);
    Route::get('packaging-monitoring', [PackagingMonitoringController::class, 'ShowPackaging']);
    Route::get('/view/item/{id}', [PackagingMonitoringController::class, 'viewItem'])->name('view.item');
    Route::put('/packaging-monitoring/{id}', [PackagingMonitoringController::class, 'update'])->name('packaging-monitoring.update');
    Route::delete('/packaging-monitoring/{id}', [PackagingMonitoringController::class, 'delete'])->name('packaging-monitoring.delete');

    //Parts of Eloading Crud//
    Route::get('Parts-of-eloading', [PartsOfEloadingController::class, 'showEloading']);
    Route::post('Parts-of-eloading', [PartsOfEloadingController::class, 'store']);
    Route::get('/view/item/{id}', [PartsOfEloadingController::class, 'viewItem'])->name('view.item');
    Route::put('/Parts-of-eloading/{id}', [PartsOfEloadingController::class, 'update'])->name('Parts-of-eloading.update');
    Route::delete('/Parts-of-eloading/{id}', [PartsOfEloadingController::class, 'delete'])->name('Parts-of-eloading.delete');

    //Eloading Best Seller Crud //
    Route::get('eloading-best-seller', [EloadingBestSeller_Controller::class, 'showData']);
    Route::post('eloading-best-seller', [EloadingBestSeller_Controller::class, 'store']);
    Route::put('eloading-best-seller/{id}', [EloadingBestSeller_Controller::class, 'updateItem']);

    // Physical Store Computer Stocks Monitoring Crud//
    Route::get('physical-store-computer-stocks-monitoring', [physical_Store_Computer_Stocks_Monitoring::class, 'showMonitoring']);
    Route::post('physical-store-computer-stocks-monitoring', [physical_Store_Computer_Stocks_Monitoring::class, 'store']);
    Route::get('/view/item/{id}', [physical_Store_Computer_Stocks_Monitoring::class, 'viewItem'])->name('view.item');
    Route::put('/physical-store-computer-stocks-monitoring/{id}', [physical_Store_Computer_Stocks_Monitoring::class, 'update'])->name('physical-store-computer-stocks-monitoring.update');
    Route::delete('/physical-store-computer-stocks-monitoring/{id}', [physical_Store_Computer_Stocks_Monitoring::class, 'delete'])->name('physical-store-computer-stocks-monitoring.delete');
});
Route::get('/sales-by-category', [OrderController::class, 'getSalesByCategory']);

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
