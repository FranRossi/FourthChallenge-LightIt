<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;



Route::get('/', [CityController::class, 'index']);

Route::get('cities', [CityController::class, 'index']);
Route::delete('cities/{city}', [CityController::class, 'destroy']);
Route::patch('cities/{city}', [CityController::class, 'update']);
Route::post('cities', [CityController::class, 'store']);
Route::get('cities/create', [CityController::class, 'create']);
Route::get('cities/{city}/edit', [CityController::class, 'edit']);
