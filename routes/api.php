<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\DataTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function () {
   return 'It works';
});

Route::middleware('client')->group(function () {
    Route::resource('data-types', DataTypeController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('models', ModelController::class);
    Route::resource('sensors', SensorController::class);
    Route::resource('settings', SettingController::class);
    Route::get('/data', [DataController::class, 'index']);
    Route::post('/data', [DataController::class, 'create']);
});

