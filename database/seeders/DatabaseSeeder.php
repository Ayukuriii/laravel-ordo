<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Feature;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Car::create([
            'name' => 'Trueno AE86',
            'type' => 'Toyota',
            'price' => '45000000',
            'year_produced' => Carbon::createFromDate(1985, 1, 1)
        ]);

        Feature::create(['name' => 'AC']);
        Feature::create(['name' => 'Power Steering']);
        Feature::create(['name' => 'E-Car']);
        Feature::create(['name' => 'V8']);

        DB::table('car_features')->insert([
            'car_id' => 1,
            'feature_id' => 1
        ]);
        DB::table('car_features')->insert([
            'car_id' => 1,
            'feature_id' => 3
        ]);
        DB::table('car_features')->insert([
            'car_id' => 1,
            'feature_id' => 4
        ]);
    }
}
