<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use \App\Http\Controllers\Api\AuthController;
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


Route::get('/get/calender/{businessKey}', [\App\Http\Controllers\Api\CalenderController::class, 'getEvents']);
Route::prefix('city')->group(function (){
    Route::post('search', [CityController::class, 'search']);
});

Route::post('stripe-payment', [\App\Http\Controllers\StripeContoller::class, 'apiPayment']);
