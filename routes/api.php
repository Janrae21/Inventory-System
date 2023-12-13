<?php

use Illuminate\Http\Request;
use App\Mail\SendProductReport;
use App\Models\User;
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

    $inventoryUsers = User::where('type', 1)->get();

    foreach ($inventoryUsers as $value) {
        Mail::to($value->email)->send(new SendProductReport($product_name, $user));
    }

    return back();
});
