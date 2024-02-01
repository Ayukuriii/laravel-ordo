<?php

use App\Http\Controllers\RoutingController;
use App\Models\Cars;
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
    $params = array(
        'name' => 'Trueno AE86',
        'type' => 'Toyota',
        'price' => '45000000',
        'year_produced' => Carbon::createFromDate(1985, 1, 1)
    );

    // $insert = DB::table('cars')->insert($params);
    $insert = Cars::create($params);

    $count = Cars::count();

    // $getCar = DB::table('cars')->where('id', 5)->first();
    $getCar = Cars::where('id', 12)->first();

    return response()->json(['count' => $count, 'data' => $getCar]);
});
