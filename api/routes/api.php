<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => '/v1'], function() {
    Route::apiResource('/vehicles', VehicleController::class);
    Route::apiResource('/makes', MakeController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::apiResource('/models', ModelController::class)->only(['index', 'store', 'update', 'destroy']);
});
