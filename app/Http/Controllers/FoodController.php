<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Method to display the food listing
    public function index()
    {
        // Get all foods, ordered by name, with pagination
        $foods = Food::orderBy('name')->paginate(10);
        return view('foods.index', compact('foods'));
    }

    // Method to handle AJAX search requests
    public function search(Request $request)
    {

        // echo $request->input('query');
        // Check if the request is AJAX
        if ($request->ajax()) {
            // Get the search query from the request
            $search = $request->input('query');

            // Query the foods based on name or category
            $foods = Food::where('name', 'LIKE', "%{$search}%")->get();

            // Return the results as JSON
            return response()->json($foods);
        }

        // If not AJAX, return an empty JSON response
        return response()->json([]);
    }
}
