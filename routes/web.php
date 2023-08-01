<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
  
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
    
    Route::get('/pisowifi', function () {
        return view('pisowifi');
    });

    Route::get('/Eloading', function () {
        return view('Eloading');
    });

    Route::get('/router', function () {
        return view('router');
    });

    Route::get('/EloadingPart', function () {
        return view('EloadingPart');
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
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});