<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;



Route::get('/', [CityController::class, 'index']);

Route::get('/cities', [CityController::class, 'index']);
Route::delete('/cities/{city}', [CityController::class, 'destroy']);
