<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'name' => fake()->domainName,
            'type' => fake()->bloodType(),
            'price' => fake()->numberBetween(45000, 99999),
            'year_produced' => fake()->dateTimeBetween('-10 years', 'now', 'Asia/Jakarta')
        ]);
    }
}
