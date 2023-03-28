<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/cities', [CityController::class, 'index']);
