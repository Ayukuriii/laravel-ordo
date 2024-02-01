<?php

use App\Http\Controllers\RoutingController;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [RoutingController::class, 'hello']);

Route::get('/perkalian/{angka?}', [RoutingController::class, 'perkalian']);

Route::get('/tambah', [RoutingController::class, 'tambah']);

Route::get('/cars', function () {
    $insert = DB::table('cars')->insert([
        'name' => 'Toyota',
        'type' => 'Trueno AE86',
        'price' => '45000000',
        'year_produced' => Carbon::createFromDate(1985, 1, 1)
    ]);

    $count = DB::table('cars')->count();

    $getCar = DB::table('cars')->where('id', 5)->first();
    
    return response()->json(['count' => $count,'data' => $getCar]);
});
