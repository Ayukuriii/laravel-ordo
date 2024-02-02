<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = Car::with('reviews')->get();
        $ratings = [];

        foreach ($cars as $car) {
            $reviews = $car->reviews;
            $ratingCount = $reviews->count();

            if ($ratingCount > 0) {
                $totalRating = $reviews->sum('rating');
                $averageRating = $totalRating / $ratingCount;
            } else {
                $averageRating = 0;
            }

            $ratings[$car->id] = $averageRating;
            $car['rating'] = $averageRating;
        }

        return response()->json([
            'data' => $cars,
        ]);
    }

    public function store(Request $request)
    {
        // http://127.0.0.1:8000/reviews/store?car_id=1&rating=5&name=haris&body=keren

        $validatedData = $request->validate([
            'car_id' => 'required',
            'rating' => 'required|integer|max:5',
            'name' => 'required|max:50',
            'body' => 'nullable',
        ]);

        // dd($request);

        $store = Review::create($validatedData);

        return response()->json(['data' => $store]);
    }
}
