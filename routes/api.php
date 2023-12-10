<?php

use App\Mail\SendProductReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('make-report/{product_name}/{user}', function ($product_name, $user) {
    Mail::to('nowayout12340@gmail.com')->send(new SendProductReport($product_name, $user));

    return back();
});
