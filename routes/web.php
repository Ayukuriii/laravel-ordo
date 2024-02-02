<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoutingController;
use App\Models\Car;
use App\Models\Manufacture;
use App\Models\Review;
use Carbon\Carbon;
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
    $insert = Car::create($params);

    $count = Car::count();

    // $getCar = DB::table('cars')->where('id', 5)->first();
    $getCar = Car::where('id', 1)->first();

    return response()->json(['count' => $count, 'data' => $getCar]);
});

Route::get('/manufactures', function () {
    $params = array(
        'car_id' => 1,
        'name' => 'Toyota',
        'address' => 'Tokyo'
    );

    Manufacture::create($params);

    $data = Car::where('id', 1)->first();

    return response()->json(['data' => $data->manufacturer]);
});

Route::get('/reviews', [ReviewController::class, 'index']);

Route::get('/reviews/store', [ReviewController::class, 'store']);
