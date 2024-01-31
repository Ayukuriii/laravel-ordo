<?php

use App\Http\Controllers\RoutingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [RoutingController::class, 'hello']);

Route::get('/perkalian/{angka?}', [RoutingController::class, 'perkalian']);

Route::get('/tambah', [RoutingController::class, 'tambah']);
