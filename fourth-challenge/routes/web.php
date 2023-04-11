<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::prefix('cities')->group(function () {
    Route::get('/', [CityController::class, 'index']);
    Route::delete('/{city}', [CityController::class, 'destroy']);
    Route::patch('/{city}', [CityController::class, 'update']);
    Route::post('/', [CityController::class, 'store']);
    Route::get('/{city}/edit', [CityController::class, 'edit']);
    Route::get('/sort', [CityController::class, 'sort']);
});

Route::prefix('airlines')->group(function () {
    Route::get('/', [AirlineController::class, 'index']);
    Route::delete('/{airline}', [AirlineController::class, 'destroy']);
    Route::patch('/{airline}', [AirlineController::class, 'update']);
    Route::post('/', [AirlineController::class, 'store']);
    Route::get('/{airline}/edit', [AirlineController::class, 'edit']);
});


