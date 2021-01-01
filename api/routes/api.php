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
    Route::get('/makes', 'MakesController@index');

    Route::apiResource('/vehicles', VehicleController::class);

    Route::get('/makes', 'MakesController@index');

    Route::get('/makes/{make}/models', 'MakesController@models');

    Route::get('/search', 'VehicleController@search');
});
